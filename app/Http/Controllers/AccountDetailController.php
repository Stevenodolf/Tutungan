<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccountDetailController extends Controller
{
    public function getProfil(){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            return view('detailAkun.akunSaya.profil',['user'=>$user]);
        }
        return redirect('login');
    }

    public function postProfil(Request $request){
        $auth = Auth::check();
        if($auth){
            $checkImage = DB::table('user')
                -> where('id', Auth::user()->id)
                -> value('image');
            if($request->inputProfil != null && $checkImage != null){
                $path = 'uploads/profile/' . $checkImage;
                Storage::deleteDirectory($path);
            }
            //picture
            $file = $request->file('inputProfil');
            $folder = uniqid() . '-' . now()->timestamp;
            $filename = uniqid(). '.' .$file->getClientOriginalExtension();
            $file->storeAs('uploads/profile/' . $folder, $filename);
            DB::table('user')
                -> where('id', Auth::user()->id)
                -> update(array('username'=> $request->nama,'gender'=>$request->gender,'phone_number' => $request->phoneNumber, 'image'=> $folder .'/'. $filename));
        }
        return redirect('/akunSaya/profil');
    }
    public function getAlamat(){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            return view('detailAkun.akunSaya.alamatPengiriman',['user'=>$user]);
        }
        return redirect('login');
    }
    public function getKreditDebit(){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $creditDebitList = DB::table('card_info')
                ->where('user_id', Auth::user()->id)
                ->groupBy('id')
                ->groupBy('user_id')
                ->orderBy('is_utama', 'desc')
                ->get();
            return view('detailAkun.akunSaya.kartuKreditDebit',['user'=>$user,'creditDebitList'=>$creditDebitList]);
        }
        return redirect('login');
    }
    public function postKreditDebit(Request $request){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $checkCreditDebit = DB::table('card_info')
                                ->where('user_id', Auth::user()->id)->exists();
            if (!$checkCreditDebit){
                DB::table('card_info')
                    ->where('user_id', Auth::user()->id)
                    ->insert(array('id' => Str::random(6), 'user_id'=>Auth::user()->id,
                        'card_type'=> $request->creditCardType, 'card_number'=>$request->cardNumber,
                        'card_valid_month' => $request->month, 'card_valid_year'=>$request->year,
                        'is_utama'=>'1'));
            }else{
                DB::table('card_info')
                    ->where('user_id', Auth::user()->id)
                    ->insert(array('id' => Str::random(6), 'user_id'=>Auth::user()->id,
                        'card_type'=> $request->creditCardType, 'card_number'=>$request->cardNumber,
                        'card_valid_month' => $request->month, 'card_valid_year'=>$request->year));
            }
            return redirect('/akunSaya/kartukreditdebit');
        }
        return redirect('login');
    }
    public function postHapusKreditDebit(Request $request){
        $auth = Auth::check();
        if ($auth){
            $check = DB::table('card_info')
                ->where('id',$request->id)
                ->where('user_id', Auth::user()->id)
                ->value('is_utama');
            if($check == '1'){
                $isNotUtamaFirst = DB::table('card_info')
                    ->where('user_id', Auth::user()->id)
                    ->where('is_utama', '0')
                    ->groupBy('id')
                    ->groupBy('user_id')
                    ->first();
                DB::table('card_info')
                    ->where('id', $isNotUtamaFirst->id)
                    ->where('user_id', Auth::user()->id)
                    ->update(array('is_utama'=>'1'));
            }
            DB::table('card_info')
                ->where('id',$request->id)
                ->where('user_id', Auth::user()->id)
                ->delete();
            return redirect('/akunSaya/kartukreditdebit');
        }
        return redirect('login');
    }
    public function postUtamaKreditDebit(Request $request){
        $auth = Auth::check();
        if ($auth){
            DB::table('card_info')
                ->where('user_id', Auth::user()->id)
                ->where('is_utama','1')
                ->update(array('is_utama'=>'0'));

            DB::table('card_info')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->update(array('is_utama'=>'1'));
            return redirect('/akunSaya/kartukreditdebit');
        }
        return redirect('login');
    }


    public function getUbahPassword(){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            return view('detailAkun.akunSaya.ubahPassword',['user'=>$user]);
        }
        return redirect('login');
    }

    public function postUbahPassword(Request $request){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $userPass = DB::table('user')
                -> where('id', Auth::user()->id)
                -> value('password');
            if(Hash::check($request->oldPassword, $userPass)){
                if($request->newPassword == $request->confirmPassword){
                    DB::table('user')
                        -> where('id', Auth::user()->id)
                        -> update(array('password'=> bcrypt($request->newPassword)));
                }else{
                    return redirect()->back();
                }
            }else{
                return redirect()->back();
            }
            return view('detailAkun.akunSaya.ubahPassword',['user'=>$user]);
        }
        return redirect('login');
    }

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

            return view('detailAkun.wishSaya.wishSaya', ['user' => $user, 'wishes' => $wishes, 'filter' => $filter]);
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
