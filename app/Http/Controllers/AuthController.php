<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginPage(){
        return view('login.login');
    }

    public function postLogin(Request $request){
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }
}
