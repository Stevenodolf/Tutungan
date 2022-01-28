<?php

namespace App\Http\Middleware;

use App\Wish;
use Closure;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;

class CheckWishPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($id, Closure $next)
    {
        $wish = Wish::where('id', $id)->first();

        if($wish->status_wish_id <= 2) {
            if($wish->user_id == Auth::user()->id){
                return redirect()->route('getWishSaya');
            }
            return redirect('/');
        }

        return $next($id);
    }
}
