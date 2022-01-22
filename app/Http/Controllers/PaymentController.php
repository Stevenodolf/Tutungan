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

    public function checkout($id){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $payment = Payment::where('id', $id)->first();

            if($user->id == $payment->user_id){
                $payment_items = Payment_Item::where('payment_id', $payment->id)->get();

                foreach($payment_items as $pi){
                    // $total_oti = $request->total_oti;
                    // $total_itu = $request->total_itu;
                    $total_oti = 40000; // biaya ongkir origin to indonesia
                    $total_itu = 25000; // biaya ongkir indonesia to user
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

        }

        return redirect('login');
    }

    public function postCheckout(Request $request, $id){
        $auth = Auth::check();
        // $auth = true;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $payment = Payment::where('id', $id)->first();

            if($user->id == $payment->user_id){
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

                    if($wish->status_wish_id == 2){
                        $curr_qty = $wish->curr_qty;
                    }else{
                        $curr_qty = $wish->curr_qty + $payment_item->qty;
                    }

                    if($transaction->user_id != $wish->created_by) {
                        $contributor = $wish->contributor + 1;
                    }else{
                        $contributor = $wish->contributor;
                    }

                    Wish::where('id', $payment_item->wish_id)->update([
                        'curr_qty' => $curr_qty,
                        'contributor' => $contributor,
                        'status_wish_id' => 3
                    ]);
                    if($transaction->getWishRelation->target_qty == $wish->curr_qty){
                        Transaction::where('wish_id', $wish->id)->update([
                            'status_transaksi_id' => 3
                        ]);
                        Wish::where('id', $transaction->wish_id)->update([
                            'status_wish_id' => 4
                        ]);
                    }

                    if($payment_item->cart_item != NULL){
                        Cart_Item::where('id', $payment_item->cart_item_id)->delete();
                    }

                }
                $payment->total_payment = $request->grand_total;
                $payment->paid = 1;
                $payment->save();

                return redirect('home');
            }

        }

        return redirect('login');
    }
}
