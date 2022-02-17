<?php

namespace App\Http\Middleware;

use Closure;

class EnsureLoginCredentials
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

        if($validator->fails()){
            return redirect('login')
                ->withInput()
                ->withErrors($validator->errors());
        }

        return $next($request);
    }
}
