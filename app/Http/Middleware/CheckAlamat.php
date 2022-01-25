<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckAlamat
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
        $checkAlamat = DB::table('address')
                        ->where('user_id', Auth::user()->id)
                        ->where('is_main',1)
                        ->count();
        if($checkAlamat == 0){
            return redirect('/akunSaya/alamatpengiriman');
        }
        return $next($request);
    }
}
