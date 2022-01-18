<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Cart_Item;
use App\Payment;
use App\Payment_Item;
use App\Shipper;
use App\Wish;
use App\Transaction;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function checkout(){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            // $user = User::where('id', Auth->usser()->id)->first();
            $payment = Payment::where('user_id', $user->id)->where('paid', 0)->first();

            $payment_items = Payment_Item::where('payment_id', $payment->id)->get();
            foreach($payment_items as $pi){
                // $total_oti = $request->total_oti;
                // $total_itu = $request->total_itu;
                $total_oti = 40000;
                $total_itu = 25000;
                // $payment_item->total_oti = $total_oti;
                // $payment_item->total_itu = $total_itu;
                $total_payment = $pi->total_price + $total_oti + $total_itu + $pi->total_fee;
                $payment_item = Payment_Item::where('id', $pi->id)->update([
                    'total_oti' => $total_oti,
                    'total_itu' => $total_itu,
                    'total_payment' => $total_payment
                ]);
            }
            $jumlah_wish = Payment_Item::where('payment_id', $payment->id)->count();
            $dshippers = Shipper::where('type', 'domestic')->get();

            return view('checkout.checkout', ['auth' => $auth, 'user' => $user, 'payment_items' => $payment_items,
                                              'dshippers' => $dshippers, 'payment' => $payment, 'jumlah_wish' => $jumlah_wish]);
        }

        return redirect('login');
    }

    public function postCheckout(Request $request){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $payment = Payment::where('user_id', $user->id)->where('paid', 0)->first();

            $payment_items = Payment_Item::where('payment_id', $payment->id)->get();
            foreach($payment_items as $payment_item){
                $transaction = new Transaction;
                $transaction->user_id = $user->id;
                $transaction->wish_id = $payment_item->wish_id;
                $transaction->qty = $payment_item->qty;
                $transaction->total_price = $payment_item->total_price;
                $transaction->total_oti = $payment_item->total_oti;
                $transaction->total_itu = $payment_item->total_itu;
                $transaction->total_fee = $payment_item->total_fee;
                $transaction->total_payment = $payment_item->total_payment;
                $transaction->status_transaksi_id = 2;
                $transaction->sub_status_transaksi_id = 1;
                $transaction->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $transaction->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $transaction->save();

                $wish = Wish::where('id', $payment_item->wish_id)->first();
                $curr_qty = $wish->curr_qty + $payment_item->qty;
                $contributor = $wish->contributor + 1;
                Wish::where('id', $payment_item->wish_id)->update([
                    'curr_qty' => $curr_qty,
                    'contributor' => $contributor
                ]);
                $wish = Wish::where('id', $payment_item->wish_id)->first();
                if($transaction->getWishRelation->target_qty == $wish->curr_qty){
                    Transaction::where('wish_id', $wish->id)->update([
                        'status_transaksi_id' => 3
                    ]);
                    Wish::where('id', $transaction->wish_id)->update([
                        'status_wish_id' => 4
                    ]);
                }

                Cart_Item::where('id', $payment_item->cart_item_id)->delete();

                $payment = Payment::where('user_id', $user->id)->update([
                    'total_payment' => $request->grand_total,
                    'paid' => 1
                ]);
            }

            return redirect('home');
        }
        return redirect('login');
    }
}
