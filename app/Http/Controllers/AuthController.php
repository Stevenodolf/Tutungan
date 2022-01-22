<?php

namespace App\Http\Controllers;

use App\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Cart;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;

class AuthController extends Controller
{
    public function showLoginPage(){
        return view('login.login');
    }

    public function postLogin(Request $request){
        $rules = [
            'email'             => "required|email|exists:user,email",
            'password'          => "required",
        ];
        $errors = [
            'email'             => "Masukkan alamat e-mail.",
            'email.exists'      => "Email atau password salah",
            'password.required' => "Masukkan password.",
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password, 'disable' => 0])){
            return redirect()->route('home');
        }
        return redirect('login');
    }

    public function showRegisterPage(){
        return view('register.register');
    }

    public function postRegister(Request $request){
        $rules = [
            'username'          => "required|min:4|max:16|unique:user",
            'email'             => "required|email|unique:user",
            'pnumber'           => "required|numeric",
            'gender'            => "required",
            'password'          => "required|min:8|max:20",
            'password2'         => "required|same:password"
        ];
        $errors = [
            'username.required' => "Masukkan username.",
            'username.unique'   => "Username sudah digunakan.",
            'username.min'      => "Username harus terdiri dari 4-16 karakter.",
            'username.max'      => "Username harus terdiri dari 4-16 karakter.",
            'email.required'    => "Masukkan alamat e-mail.",
            'email.email'       => "Masukkan alamat e-mail.",
            'email.unique'      => "Email sudah terdaftar.",
            'pnumber'           => "Periksa kembali nomor telepon yang anda masukkan.",
            'gender.required'   => "Pilih gender anda.",
            'password.required' => "Masukkan password.",
            'password.min'      => "Password harus terdiri dari 8-20 karakter.",
            'password.max'      => "Password harus terdiri dari 8-20 karakter.",
            'password2.required'   => "Ulangi password yang telah anda masukkan.",
            'password2.same'   => "Password tidak sama."
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User();
        $id = rand(1000,9000);
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

        $token = Str::random(64);
        $userVerify = new UserVerify();
        $userVerify->user_id = $id;
        $userVerify->token = $token;
        $userVerify->created_at = Carbon::now();
        $userVerify->updated_at = Carbon::now();
        $userVerify->save();

        Mail::send('email.confirmationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification');
        });

        $messages = "We've Send you an email confirmation!";
        return redirect()->route('getLogin');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }

    public function verifyAccount($token)
    {
        $verifyUser = DB::table('user_verify')->where('token', $token);

        $messages = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = DB::table('user') -> where('id', $verifyUser->value('user_id'))->value('is_email_verified');
            if($user != 1) {
                DB::table('user')
                    -> where('id', $verifyUser->value('user_id'))
                    -> update(array('is_email_verified' => 1));
                $messages = "Your e-mail is verified. You can now login.";
            } else {
                $messages = "Your e-mail is already verified. You can now login.";
            }

            $cart = new Cart();
            $cart->user_id = $verifyUser->value('user_id');
            $cart->created_at = Carbon::now();
            $cart->updated_at = Carbon::now();
            $cart->save();
        }
        return redirect()->route('getLogin')->with('message', $messages);
    }


}
