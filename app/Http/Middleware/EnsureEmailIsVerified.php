<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'email'             => "Masukkan alamat e-mail.",
            'email.exists'      => "Email atau password salah",
            'password.required' => "Masukkan password.",
        ];
        $validator = Validator::make($request->all(), $rules, $errors);
        dd($validator);
        if($validator->fails()){
            return redirect('/login')
                ->withInput()
                ->withErrors($validator->errors());
        }

        $checkVerified = DB::table('user')
            ->where('email', $request->email)
            ->value('is_email_verified');
        if($checkVerified == 0){
            return redirect('/login');
        }
        return $next($request);
    }
}
