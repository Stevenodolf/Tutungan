<?php

namespace App\Http\Controllers;

use App\Address;
use App\Notification_Wish;
use App\Shipment_Status;
use App\Transaction;
use App\User;
use App\Wish;
use App\Cart;
use App\Cart_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;

class AccountDetailController extends Controller
{
    //API AMBIL DATA
    public function getAlamatDetail(Request $request){
        $auth = Auth::check();
        if($auth){
            return response()->json(DB::table('address')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first());
        }
    }
    public function getProvinsi(){
        $auth = Auth::check();
        if($auth){
            return response()->json(DB::table('address_provinsi')
                ->pluck('nama','id'));
        }

    }
    public function getKota(Request $request){
        $auth = Auth::check();
        if($auth){
            return response()->json(DB::table('address_kabupaten')
                ->where('provinsi_id', $request->provinsi)
                ->pluck('id','nama'));
        }
    }

    public function getKecamatan(Request $request){
        $auth = Auth::check();
        if($auth){
            return response()->json(DB::table('address_kecamatan')
                ->where('kabupaten_id', $request->kabupaten)
                ->pluck('id','nama'));
        }

    }

    public function getProfilePicture(Request $request) {
        $auth = Auth::check();
        if($auth){

        }
    }

    //END OF API AMBIL DATA

    public function getProfil(){
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('detailAkun.akunSaya.profil',['user'=>$user, 'cart_items' => $cart_items, 'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
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
                $path = 'uploads/' . $checkImage;
                Storage::disk('s3')->delete($path);
            }
            //picture
            $file = $request->file('inputProfil');
            if($file){
                $path = Storage::disk('s3')->put('uploads/' , $file);

                DB::table('user')
                    -> where('id', Auth::user()->id)
                    -> update(array('username'=> $request->nama,'gender'=>$request->gender,'phone_number' => $request->phoneNumber, 'image'=> basename($path)));
            }else{
                DB::table('user')
                    -> where('id', Auth::user()->id)
                    -> update(array('username'=> $request->nama,'gender'=>$request->gender,'phone_number' => $request->phoneNumber));
            }

        }
        return redirect('/akunSaya/profil');
    }
    public function getAlamat(){
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $provinsi = DB::table('address_provinsi')->get();
            $alamat = Address::where('user_id', Auth::user()->id)
                ->where('is_deleted','0')
                ->orderBy('is_main', 'desc')
                ->get();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('detailAkun.akunSaya.alamatPengiriman',['user'=>$user,'provinsi'=>$provinsi,'alamat'=>$alamat, 'cart_items' => $cart_items,
                                                                'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }
        return redirect('login');
    }

    public function postAlamat(Request $request){
        $auth = Auth::check();
        if ($auth){
            $checkAddress = DB::table('address')
                ->where('user_id', Auth::user()->id)->exists();
            if (!$checkAddress){
                DB::table('address')
                    ->insert(array('id' => mt_rand(1000000, 9999999), 'user_id'=>Auth::user()->id,
                        'fullname'=> $request->fullname, 'phone_number'=>$request->phoneNumber,
                        'address_label' => $request->labelAlamat, 'address_provinsi_id'=>$request->provinsi,
                        'address_kabupaten_id' => $request->kota, 'address_kecamatan_id'=>$request->kecamatan,
                        'kode_pos' => $request->kodePos, 'address_detail'=>$request->detilAlamat, 'note'=>$request->note,
                        'is_main'=>'1','is_temp'=>'1'));
            }else{
                DB::table('address')
                    ->insert(array('id' => mt_rand(1000000, 9999999), 'user_id'=>Auth::user()->id,
                        'fullname'=> $request->fullname, 'phone_number'=>$request->phoneNumber,
                        'address_label' => $request->labelAlamat, 'address_provinsi_id'=>$request->provinsi,
                        'address_kabupaten_id' => $request->kota, 'address_kecamatan_id'=>$request->kecamatan,
                        'kode_pos' => $request->kodePos, 'address_detail'=>$request->detilAlamat, 'note'=>$request->note));
            }
            return redirect('/akunSaya/alamatpengiriman');
        }
        return redirect('login');
    }
    public function postHapusAlamat(Request $request){
        $auth = Auth::check();
        if($auth){
            $checkUtama = DB::table('address')
                ->where('id',$request->id)
                ->where('user_id', Auth::user()->id)
                ->value('is_main');
            $checkTemp = DB::table('address')
                ->where('id',$request->id)
                ->where('user_id', Auth::user()->id)
                ->value('is_main');
            $checkBanyak = DB::table('address')
                ->where('user_id', Auth::user()->id)
                ->count();
            if($checkUtama == 1 && $checkBanyak > 1){
                $isNotUtamaFirst = DB::table('address')
                    ->where('user_id', Auth::user()->id)
                    ->where('is_main', '0')
                    ->groupBy('id')
                    ->groupBy('user_id')
                    ->first();
                if($checkTemp == 1){
                    DB::table('address')
                        ->where('id', $isNotUtamaFirst->id)
                        ->where('user_id', Auth::user()->id)
                        ->update(array('is_main'=>'1','is_temp'=>1));
                }else{
                    DB::table('address')
                        ->where('id', $isNotUtamaFirst->id)
                        ->where('user_id', Auth::user()->id)
                        ->update(array('is_main'=>'1'));
                }
            }
            DB::table('address')
                ->where('id',$request->id)
                ->where('user_id', Auth::user()->id)
                ->update(array('is_deleted'=>'1', 'is_main' => '0', 'is_temp' => '0'));

            return redirect('/akunSaya/alamatpengiriman');
        }
        return redirect('login');
    }

    public function postUtamaAlamat(Request $request){
        $auth = Auth::check();
        if($auth){
            DB::table('address')
                ->where('user_id', Auth::user()->id)
                ->where('is_main','1')
                ->update(array('is_main'=>'0'));

            DB::table('address')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->update(array('is_main'=>'1'));
            return redirect('/akunSaya/alamatpengiriman');
        }
        return redirect('login');
    }
    public function postTempAlamat(Request $request){
        $auth = Auth::check();
        if($auth){
            DB::table('address')
                ->where('user_id', Auth::user()->id)
                ->where('is_temp','1')
                ->update(array('is_temp'=>'0'));

            DB::table('address')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->update(array('is_temp'=>'1'));
            return redirect('/akunSaya/alamatpengiriman');
        }
        return redirect('login');
    }
    public function postUbahAlamat(Request $request){
        $auth = Auth::check();
        if ($auth){
            DB::table('address')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->update(array('fullname'=>$request->ubahFullname, 'phone_number'=>$request->ubahPhoneNumber,'address_label'=>$request->ubahLabelAlamat,
                        'address_provinsi_id'=>$request->ubahProvinsi, 'address_kabupaten_id'=>$request->ubahKota,'address_kecamatan_id'=>$request->ubahKecamatan,
                        'kode_pos'=>$request->ubahKodePos, 'address_detail'=>$request->ubahDetilAlamat, 'note'=>$request->ubahNote));
            return redirect('/akunSaya/alamatpengiriman');
        }
        return redirect('login');
    }

    public function getKreditDebit(){
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $creditDebitList = DB::table('card_info')
                ->where('user_id', Auth::user()->id)
                // ->groupBy('id')
                // ->groupBy('user_id')
                ->orderBy('is_utama', 'desc')
                ->get();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('detailAkun.akunSaya.kartuKreditDebit',['user'=>$user,'creditDebitList'=>$creditDebitList, 'cart_items' => $cart_items,
                                                                'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }
        return redirect('login');
    }
    public function postKreditDebit(Request $request){
        $rules = [
            'cardNumber'        => "required|digits:16",
            'month'             => "required|digits:2|between:1,12",
            'year'              => "required|digits:2|between:0,99"
        ];
        $errors = [
            'cardNumber.required'   =>  "Nomor kartu harus 16 digit",
            'cardNumber.digits'   =>  "Nomor kartu harus 16 digit",
            'month.required'   =>  "Bulan masa berlaku kartu harus 2 digit",
            'month.digits'   =>  "Bulan masa berlaku kartu harus 2 digit",
            'month.between'   =>  "Bulan masa berlaku kartu harus di antara 01-12",
            'year.required'   =>  "Tahun masa berlaku kartu harus 2 digit",
            'year.digits'   =>  "Tahun masa berlaku kartu harus 2 digit",
            'year.between'   =>  "Tahun masa berlaku kartu harus di antara 00-99"
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

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
            $checkCount = DB::table('card_info')
                ->where('user_id', Auth::user()->id)
                ->count();
            if($check == '1' && $checkCount > 1){
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

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('detailAkun.akunSaya.ubahPassword',['user'=>$user, 'cart_items' => $cart_items, 'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }
        return redirect('login');
    }

    public function postUbahPassword(Request $request){
        $auth = Auth::check();
        if ($auth){
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

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
            return view('detailAkun.akunSaya.ubahPassword',['user'=>$user, 'cart_items' => $cart_items, 'notifs' => $notifs,
                                                            'addressNavbar' => $addressNavbar]);
        }
        return redirect('login');
    }

    public function getWishSaya(Request $request) {
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            if($request->filter == 0 or $request->filter == null) {
                $wishes = Wish::where('created_by', $user->id)
                            // ->orderBy('created_at', 'DESC')
                            ->get();
                $filter = 0;
            }else{
                $filter = $request->filter;
                $wishes = Wish::where('created_by', $user->id)->where('status_wish_id', $filter)
                            // ->orderBy('created_at', 'DESC')
                            ->get();
            }
            $transactions = Transaction::where('user_id', $user->id)
                                        // ->orderBy('created_at', 'DESC')
                                        ->get();

            return view('detailAkun.wishSaya.wishSaya', ['user' => $user, 'wishes' => $wishes, 'filter' => $filter, 'transactions' => $transactions,
                                                        'cart' => $cart, 'cart_items' => $cart_items, 'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }

        return redirect('login');
    }

    public function getTransaksiSaya(Request $request) {
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            if($request->filter == 7 or $request->filter == null) {
                $transactions = Transaction::where('user_id', $user->id)->where('status_transaksi_id', '!=', 0)
                                        ->orderBy('created_at', 'DESC')
                                        ->get();
                $filter = 7;
            }else{
                $filter = $request->filter;
                $transactions = Transaction::where('user_id', $user->id)->where('status_transaksi_id', '!=', 0)->where('status_transaksi_id', $filter)
                                            ->orderBy('created_at', 'DESC')
                                            ->get();
            }

            return view('detailAkun.transaksiSaya.transaksiSaya', ['user' => $user, 'transactions' => $transactions, 'filter' => $filter,
                                                                    'cart' => $cart, 'cart_items' => $cart_items, 'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }

        return redirect('login');

    }

    public function getDetailTransaksi($id) {
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            $transaction = Transaction::where('id', $id)->first();
            $wish = $transaction->getWishRelation;

            $address = $transaction->getAddressRelation;
            $kecamatan = $address->getKecamatanRelation;
            $kabupaten = $kecamatan->getKabupatenRelation;
            $provinsi = $kabupaten->getProvinsiRelation;

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            $shipment_statuses = Shipment_Status::where('transaction_id', $transaction->id)
                ->orderBy('created_at', 'DESC')
                ->orderBy('sub_status_transaksi_id', 'DESC')
                ->get();

            return view('detailAkun.transaksiSaya.detailTransaksi',
                ['user' => $user, 'transaction' => $transaction, 'wish' => $wish,'cart_items' => $cart_items, 'notifs' => $notifs,
                    'address' => $address, 'kecamatan' => $kecamatan, 'kabupaten' => $kabupaten, 'provinsi' => $provinsi, 'shipment_statuses' => $shipment_statuses, 'addressNavbar'=>$addressNavbar]);
        }

        return redirect('login');
    }

    public function batalkanTransaksi($id) {
        $auth = Auth::check();

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            Transaction::where('id', $id)->update(['status_transaksi_id' => 6, 'sub_status_transaksi_id' => 9]);

            $transaction = Transaction::where('id', $id)->first();
            $wish = $transaction->getWishRelation;

            $shipment_status = new Shipment_Status;
            $shipment_status->transaction_id = $transaction->id;
            $shipment_status->sub_status_transaksi_id = 9;
            $shipment_status->save();

            $notification_wish = new Notification_Wish;
            $notification_wish->user_id = $user->id;
            $notification_wish->wish_id = $wish->id;
            $notification_wish->notification_id = 6;
            $notification_wish->save();

            $wish->curr_qty -= $transaction->qty;
            $wish->save();

            $transactions = Transaction::where('user_id', $user->id);

            return redirect('transaksisaya');
        }

        return redirect('login');
    }

    public function getNotification() {
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            $notification_wishes = Notification_Wish::where('user_id', $user->id)
                                                ->orderBy('created_at', 'DESC')
                                                ->orderBy('notification_id', 'DESC')
                                                ->take(10)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            Notification_Wish::where('user_id', $user->id)
                            ->orderBy('created_at', 'DESC')
                            ->update(['is_read' => 1]);

            return view('detailAkun.notifikasi.notifikasi', ['user' => $user, 'notifs' => $notifs, 'notification_wishes' => $notification_wishes,
                                                             'cart' => $cart, 'cart_items' => $cart_items, 'addressNavbar'=>$addressNavbar]);
        }

        return redirect('login');
    }

}
