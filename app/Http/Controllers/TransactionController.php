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
use App\Wish;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function checkout(){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            // $user = User::where('id', Auth->usser()->id)->first();
            $transaction = Transaction::where('user_id', $user->id)->first();

            $transaction_items = Transaction_Item::where('transaction_id', $transaction->id)->get();
            $jumlah_wish = Transaction_Item::where('transaction_id', $transaction->id)->count();
            $dshippers = Shipper::where('type', 'domestic')->get();

            return view('checkout.checkout', ['auth' => $auth, 'user' => $user, 'transaction_items' => $transaction_items,
                                              'dshippers' => $dshippers, 'transaction' => $transaction, 'jumlah_wish' => $jumlah_wish]);
        }

        return redirect('login');
    }

    public function postCheckout(Request $request){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $transaction = Transaction::where('user_id', $user->id)->first();
            $transaction->total_bayar = $request->total_bayar;

            $transaction_items = Transaction_Item::where('status_transaksi_id', 1)->get();
            foreach($transaction_items as $transaction_item){
                $transaction_item->status_transaksi_id = 2;
                $wish = Wish::where('id', $transaction_item->wish_id)->first();
                $wish->curr_qty = $wish->curr_qty - $transaction_item->qty;
            }

            return redirect('home');
        }
        return redirect('login');
    }
}
