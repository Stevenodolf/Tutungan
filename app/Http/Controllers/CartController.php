<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    public function cart(){
        // $auth = Auth::check();
        $auth = true;
        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $carts = Cart::where('user_id', $user->id)->get();

            return view('keranjang.keranjang', ['user' => $user, 'carts' => $carts]);
        }
        return redirect('login');
    }

    public function addCart(){
        $auth = true;
        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->wish_id = $request->wish_id;
            $cart->created_at = Carbon::now();
            $cart->updated_at = Carbon::now();
            $cart->save();

            return redirect('cart');
        }
        return redirect('login');
    }
}
