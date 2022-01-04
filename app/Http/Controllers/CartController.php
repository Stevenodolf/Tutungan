<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Cart;
use Carbon\Carbon;
use Validator;

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

    public function addCart(Request $request){
        $auth = true;
        if($auth){
            $wish = Wish::where('id', $request->wish_id)->first();
            $min_order = $wish->min_order;
            $stok = $wish->target_qty - $wish->curr_qty;
            $rules = [
                'qty'           => "required|numeric|min:$min_order|max:$stok"
            ];
            $errors = [
                'qty.required'  => 'Masukkan jumlah barang yang ingin dibeli.',
                'qty.min'       => 'Jumlah yang dimasukkan belum mencapai minimum order.',
                'qty.max'       => 'Jumlah yang dimasukkan melebihi stok yang tersedia.'
            ];

            $validator = Validator::make($request->all(), $rules, $errors);
            
            if($validator->fails()){
                return redirect()->back()->withErrors($validator->errors());
            }

            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->wish_id = $request->wish_id;
            $cart->qty = $request->qty;
            $wish_price = $wish->price;
            $cart->total_price = $wish_price * $request->qty;
            $cart->created_at = Carbon::now();
            $cart->updated_at = Carbon::now();
            $cart->save();

            return redirect('cart');
        }
        return redirect('login');
    }

    public function deleteCart($cart_id){
        $auth = true;
        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $cart = Cart::where('id', $cart_id)->first();
            $cart->delete();

            return redirect('cart');
        }
        return redirect('login');
    }
}
