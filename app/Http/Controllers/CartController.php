<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Cart;
use App\Cart_Item;
use App\Payment;
use App\Payment_Item;
use App\Shipper;
use Carbon\Carbon;
use Validator;

class CartController extends Controller
{
    public function cart(){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $total_qty = 0;
            $total_price = 0;
            foreach($cart_items as $cart_item){
                $total_qty = $total_qty + $cart_item->qty;
                $total_price = $total_price + $cart_item->total_price;
            }

            $cart = Cart::where('user_id', $user->id)->update([
                'total_qty' => $total_qty,
                'total_price' => $total_price
            ]);
            $cart = Cart::where('user_id', $user->id)->first();
            
            return view('keranjang.keranjang', ['user' => $user, 'cart' => $cart, 'cart_items' => $cart_items]);
        }
        return redirect('login');
    }

    public function addCart(Request $request){
        $auth = Auth::check();
        // $auth = true;

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
            $user = User::where('id', Auth::user()->id)->first();

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_item = new Cart_Item();
            $cart_item->cart_id = $cart->id;
            $cart_item->wish_id = $request->wish_id;
            $cart_item->qty = $request->qty;
            $wish_price = $wish->price;
            $cart_item->total_price = $wish_price * $request->qty;
            $cart_item->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $cart_item->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $cart_item->save();
            
            // $cart->total_qty = $cart->total_qty + $cart_item->qty;
            // $cart->total_price = $cart->total_price + $cart_item->total_price;
            $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $cart->save();

            return redirect('cart');
        }
        return redirect('login');
    }

    public function deleteCart($cart_item_id){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_item = Cart_Item::where('id', $cart_item_id)->first();
            $cart_item->delete();

            // $cart->total_qty = $cart->total_qty - $cart_item->qty;
            // $cart->total_price = $cart->total_price - $cart_item->total_price;
            $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $cart->save();

            return redirect('cart');
        }
        return redirect('login');
    }

    public function postCart(Request $request){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->total_price = $request->total_price;
            $payment->total_qty = $request->total_qty;
            // $payment->wish_id = $wishes->implode('wish_id', ',');
            $payment->save();

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();
            foreach ($cart_items as $cart_item){
                $payment_item = new Payment_Item;
                $payment_item->payment_id = $payment->id;
                $payment_item->cart_item_id = $cart_item->id;
                $payment_item->wish_id = $cart_item->wish_id;
                $payment_item->status_transaksi_id = 1;
                $payment_item->qty = $cart_item->qty;
                $payment_item->total_price = $cart_item->total_price;
                $payment_item->total_fee = 10000;
                $payment_item->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $payment_item->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $payment_item->save();
            }

            return redirect('checkout');
        }

        return redirect('login');
    }
}
