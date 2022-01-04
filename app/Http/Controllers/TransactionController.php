<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Transaction;
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
            $transaction->wish_id = Cart::where('user_id', $user->id)->get('wish_id')->toArray();

            $transaction->save();  

            return view('checkout.checkout', ['auth' => $auth, 'user' => $user]);
        }

        return redirect('login');
    }
}
