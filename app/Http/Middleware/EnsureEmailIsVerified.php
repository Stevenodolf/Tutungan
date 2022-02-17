<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rules = [
            'email'             => "required|email|exists:user,email",
            'password'          => "required",
        ];
        $errors = [
            'email.required'    => "Masukkan alamat e-mail",
            'email.email'       => "Format email salah",
            'email.exists'      => "Email atau password salah",
            'password.required' => "Masukkan password",
        ];

        $validator = Validator::make($request->all(), $rules, $errors);
        if($validator->fails()){
            return redirect('/login')
                ->withInput()
                ->withErrors($validator->errors());
        }

        $checkVerified = DB::table('user')
            ->where('email', $request->email)
            ->value('is_email_verified');
        if($checkVerified == 0){
            return redirect('/login')
                ->withErrors("Email belum terverifikasi, silahkan check email untuk verifikasi");
        }
        return $next($request);
    }
}
