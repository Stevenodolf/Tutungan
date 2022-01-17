<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Cart;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginPage(){
        return view('login.login');
    }

    public function postLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password, 'disable' => 0])){
            return redirect()->route('home');
        }
    }

    public function showRegisterPage(){
        return view('register.register');
    }

    public function postRegister(Request $request){
        if($request->password == $request->password2){
            $user = new User();
            $id = rand(2,50);
            $user->id = $id;
            $user->username = $request->username;
            $user->email = $request->email ;
            $user->phone_number = $request->pnumber;
            $user->bod = $request->year .'-' .$request->month .'-' .$request->day;
            $user->gender = $request->gender;
            $user->password = bcrypt($request->password);
            $user->role_id = '2';
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();
            $user->save();

            $cart = new Cart();
            $cart->user_id = $id;
            $cart->created_at = Carbon::now();
            $cart->updated_at = Carbon::now();
            $cart->save();

            return redirect()->route('home');
        }else{
            return redirect()->route('getRegister');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }
}
