<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Cart;
use App\Cart_Item;
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

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            return view('keranjang.keranjang', ['user' => $user, 'cart' => $cart, 'cart_items' => $cart_items]);
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

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_item = new Cart_Item();
            $cart_item->cart_id = $cart->id;
            $cart_item->wish_id = $request->wish_id;
            $cart_item->qty = $request->qty;
            $wish_price = $wish->price;
            $cart_item->total_price = $wish_price * $request->qty;
            $cart_item->created_at = Carbon::now();
            $cart_item->updated_at = Carbon::now();

            $cart->total_qty = $cart->total_qty + $cart_item->qty;
            $cart->total_price = $cart->total_price + $cart_item->total_price;
            $cart->updated_at = Carbon::now();
            $cart_item->save();

            return redirect('cart');
        }
        return redirect('login');
    }

    public function deleteCart($cart_item_id){
        $auth = true;
        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $cart_item = Cart_Item::where('id', $cart_item_id)->first();
            $cart_item->delete();

            return redirect('cart');
        }
        return redirect('login');
    }
}
