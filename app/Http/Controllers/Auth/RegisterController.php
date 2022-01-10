<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Cart;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'username' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'phone_number' => ['required', 'string', 'min:15'],
    //         'bod' => ['required', 'datetime'],
    //         'gender' => ['required', 'integer'],
    //         'address' => ['string', 'max:1000'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'phone_number' => $data['phone_number'],
    //         'bod' => $data['bod'],
    //         'gender' => $data['gender'],
    //         'address' => $data['address']
    //     ]);
    // }

    public function getRegister(){
        $auth = false;
        Auth::logout();

        return view('register.register', ['auth' => $auth]);
    }

    public function postRegister(Request $request){
        $rules = [
            'username'      => 'required|unique:user',
            'email'         => 'required|email|unique:user,email',
            'password'      => 'required',
            'password2'     => 'required|same:password',
            'phone_number'  => 'required|numeric|min:10',
            'bod'           => 'required|date'
        ];

        $errors = [
            'username.required'     => 'Masukkan username.',
            'username.unique'       => 'Username sudah digunakan, silahkan gunakan username lain.',
            'email'                 => 'Masukkan e-mail.',
            'password.required'     => 'Masukkan password.',
            'password2'             => 'Password tidak sama.',
            'phone_number'          => 'Masukkan nomor handphone.',
            'bod'                   => 'Masukkan tanggal lahir.'
        ];

        $validator = Validator::make($request->all(), $rules, $errors);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User;
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 2;
        $user->phone_number = $request->phone_number;
        $user->bod = $request->bod;
        $user->gender = NULL;
        $user->address = NULL;
        $user->disable = 0;
        $user->timestamps();
        $user->save();
        
        $data = $request->only('username', 'password');
        $auth = Auth::attempt($data);


        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->total_price = 0;
        $cart->total_qty = 0;
        $cart->timestamp();
        $cart->save();

        return view('login.login', ['auth' => $auth, 'user' => $user]);
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
