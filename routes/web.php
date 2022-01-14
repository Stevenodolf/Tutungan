<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//  Route::get('/', function () {
//      return view('detailAkun.detailAkunTemplate');
//  });

Route::get('/', 'HomeController@home')->name('home');

Route::get('/home', function(){
    return redirect('/');
});

Route::get('/login', 'AuthController@showLoginPage')->name('getLogin');
Route::post('/login', 'AuthController@postLogin')->name('postLogin');
Route::get('/register', 'AuthController@showRegisterPage')->name('getRegister');
Route::post('/register', 'AuthController@postRegister') ->name('postRegister');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/wish/{id}', 'WishController@wishDetail');
Route::post('/wish/{id}', 'CartController@addCart');
Route::get('/wish/delete-cart/{cart_item_id}', 'CartController@deleteCart');
Route::get('/cart', 'CartController@cart');
Route::post('/cart', 'CartController@postCart');

Route::get('/checkout', 'TransactionController@checkout');
Route::post('/checkout', 'TransactionController@postCheckout');

// DETAIL AKUN
Route::get('/akunSaya/profil', function(){
    return view('detailAkun.akunSaya.profil');
});
Route::get('/akunSaya/alamatpengiriman', function(){
    return view('detailAkun.akunSaya.alamatPengiriman');
});
Route::get('/akunSaya/kartukreditdebit', function(){
    return view('detailAkun.akunSaya.kartuKreditDebit');
});
Route::get('/akunSaya/ubahpassword', function(){
    return view('detailAkun.akunSaya.ubahPassword');
});
Route::get('/notifikasi', function(){
    return view('detailAkun.notifikasi.notifikasi');
});
Route::get('/wishsaya', function(){
    return view('detailAkun.wishSaya.wishSaya');
});
Route::get('/transaksisaya', function(){
    return view('detailAkun.transaksiSaya.transaksiSaya');
});
Route::get('/transaksisaya/detailtransaksi', function(){
    return view('detailAkun.transaksiSaya.detailTransaksi');
});
