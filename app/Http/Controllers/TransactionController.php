<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Cart_Item;
use App\Transaction;
use App\Transaction_Item;
use App\Shipper;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function checkOut(Request $request){
        // $auth = Auth::check();
        $auth = true;

        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->status_transaksi_id = 1;
            $transaction->total_price = $request->total_price;
            $transaction->total_qty = $request->total_qty;
            // $transaction->wish_id = $wishes->implode('wish_id', ',');
            $transaction->save();

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();
            foreach ($cart_items as $cart_item){
                $transaction_item = new Transaction_Item;
                $transaction_item->transaction_id = $transaction->id;
                $transaction_item->wish_id = $cart_item->wish_id;
                $transaction_item->qty = $cart_item->qty;
                $transaction_item->total_price = $cart_item->total_price;
                $transaction_item->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $transaction_item->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $transaction_item->save();
            }

            $transaction_items = Transaction_Item::where('transaction_id', $transaction->id)->get();
            $dshippers = Shipper::where('type', 'domestic')->get();

            return view('checkout.checkout', ['auth' => $auth, 'user' => $user, 'transaction_items' => $transaction_items,
                                              'dshippers' => $dshippers, 'transaction' => $transaction]);
        }

        return redirect('login');
    }
}
