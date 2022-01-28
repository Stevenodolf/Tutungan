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
//        $wish = Wish::where('id', $id)->first();
        $wish_status_wish_id = Wish::where('id', $id)->value('status_wish_id');
        $wish_user_id = Wish::where('id', $id)->value('user_id');

        if($wish_status_wish_id <= 2) {
            if($wish_user_id == Auth::user()->id){
                return redirect()->route('getWishSaya');
            }
            return redirect('/');
        }

        return $next($id);
    }
}
