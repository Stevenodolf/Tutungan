<?php

namespace App\Http\Middleware;

use App\Wish;
use Closure;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckWishPayment
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
        $wish = Wish::where('id', $request->id)->first();
        $wish_status_wish_id = Wish::where('id', $request->id)->value('status_wish_id');
        $wish_created_by = Wish::where('id', $request->id)->value('created_by');

        if($wish_status_wish_id <= 2) {
            if(!Auth::guest()) {
                if($wish_created_by == Auth::user()->id){
                    return redirect()->route('getWishSaya');
                }
            }
            return redirect('/');
        }

        $now = Carbon::now('Asia/Jakarta');
        if($wish->deadline <= $now){
            $wish->status_wish_id = 4;
            $wish->save();
        }


        if($wish_status_wish_id >= 4) {
            return redirect('/');
        }

        return $next($request);
    }
}
