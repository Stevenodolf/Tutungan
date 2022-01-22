<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDetailController extends Controller
{
//    public function getWishSaya() {
//        $auth = Auth::check();
//
//        if($auth) {
//            $user = User::where('id', Auth::user()->id)->first();
//            $wishes = Wish::where('created_by', $user->id)->get();
//
//            return view('detailAkun.wishSaya.wishSaya', ['user' => $user, 'wishes' => $wishes]);
//        }
//
//        return redirect('login');
//    }

    public function getWishSaya(Request $request) {
        $auth = Auth::check();
//        echo $request->filter;

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            if($request->filter == 0 or $request->filter == null) {
                $wishes = Wish::where('created_by', $user->id)->get();
                $filter = 0;
            }else{
                $filter = $request->filter;
                $wishes = Wish::where('created_by', $user->id)->where('status_wish_id', $filter)->get();
            }
            $transactions = Transaction::where('user_id', $user->id)->get();

            return view('detailAkun.wishSaya.wishSaya', ['user' => $user, 'wishes' => $wishes, 'filter' => $filter, 'transactions' => $transactions]);
        }

        return redirect('login');
    }

    public function getTransaksiSaya(Request $request) {
        $auth = Auth::check();

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            if($request->filter == 7 or $request->filter == null) {
                $transactions = Transaction::where('user_id', $user->id)->where('status_transaksi_id', '!=', 0)->get();
                $filter = 7;
            }else{
                $filter = $request->filter;
                $transactions = Transaction::where('user_id', $user->id)->where('status_transaksi_id', '!=', 0)->where('status_transaksi_id', $filter)->get();
            }

            return view('detailAkun.transaksiSaya.transaksiSaya', ['user' => $user, 'transactions' => $transactions, 'filter' => $filter]);

        }

        return redirect('login');

    }

    public function getDetailTransaksi($id) {
        $auth = Auth::check();

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            $transaction = Transaction::where('id', $id)->first();
            $wish = $transaction->getWishRelation;

            return view('detailAkun.transaksiSaya.detailTransaksi', ['user' => $user, 'transaction' => $transaction, 'wish' => $wish]);
        }

        return redirect('login');
    }

}
