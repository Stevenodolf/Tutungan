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
        $checkVerified = DB::table('user')
            ->where('email', $request->email)
            ->value('is_email_verified');
        if($checkVerified == 0){
            return redirect('/login');
        }
        return $next($request);
    }
}
