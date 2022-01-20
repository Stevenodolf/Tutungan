<?php

namespace App\Http\Controllers;

use App\User;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDetailController extends Controller
{
    public function getWishSaya() {
        $auth = Auth::check();

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();
            $wishes = Wish::where('created_by', $user->id)->get();

            return view('detailAkun.wishSaya.wishSaya', ['user' => $user, 'wishes' => $wishes]);
        }

        return redirect('login');
    }
}
