<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckDeadline
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
        $now = Carbon::now('Asia/Jakarta');
        $wishes = DB::table('wish')
                    ->where('status_wish_id', 3)
                    ->where('deadline', '<=', $now)
                    ->update([
                        'status_wish_id' => 4
                    ]);

        return $next($request);
    }
}
