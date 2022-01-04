<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(){
        $auth = false;
        Auth::logout();

        return view('login.login', ['auth' => $auth]);
    }

    public function postLogin(Request $request){
        $data = $request->only('email', 'password');
        $auth = Auth::attempt($data);

        $rules = [
            'email' => 'exists:user,email'
        ];

        $errors = [
            'email.exists' => 'This Email is not Registered'
        ];

        $validator = Validator::make($request->all(), $rules, $errors);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        if($auth){
            $user = Auth::user();
            if($user->disable == 0){
                return redirect('/home');
            }
            else{
                $auth = false;
                Auth::logout();
                return back()->with('notActive', 'Your account has been disabled.');
            }
        }
        else{
            $auth = false;
            Auth::logout();
            return back()->with('error', 'Invalid Email or Password');
        }

    }
}
