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

//
//  Route::get('/', function () {
//      return view('email.forgotPassword');
//  });

Route::get('/', 'HomeController@home')->name('home');

Route::get('/home', function(){
    return redirect('/');
});

Route::get('/tick', function(){
    return view('wish.tick');
});

//Forgot Password
Route::get('/forgotPassword', 'ForgotPasswordController@showForgotPassword');
Route::post('/forgotPassword', 'ForgotPasswordController@submitForgotPassword');
Route::get('/resetPassword/{token}', 'ForgotPasswordController@showResetPassword')->name('resetPassword');
Route::post('/resetPassword', 'ForgotPasswordController@submitResetPassword')->name('submitReset');

//Auth
Route::get('/login', 'AuthController@showLoginPage')->name('getLogin');
Route::post('/login', 'AuthController@postLogin')->name('postLogin');
Route::get('/register', 'AuthController@showRegisterPage')->name('getRegister');
Route::post('/register', 'AuthController@postRegister') ->name('postRegister');
Route::get('/account/verify/{token}', 'AuthController@verifyAccount') ->name('userVerify');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/createWish', 'WishController@getCreateWish');
Route::post('/createWish', 'WishController@postCreateWish');
Route::get('/wish/{id}', 'WishController@wishDetail');
Route::post('/wish/{id}', 'CartController@addCart')->name('addToCart');
Route::post('/buy/{id}', 'CartController@buyWish')->name('buyWish');
Route::get('/wish/delete-cart/{cart_item_id}', 'CartController@deleteCart');
Route::get('/cart', 'CartController@cart');
Route::post('/cart', 'CartController@postCart');

Route::get('/checkout', 'PaymentController@checkout')->name('getCheckout');
Route::post('/checkout', 'PaymentController@postCheckout');

// DETAIL AKUN

Route::get('/akunSaya/profil','AccountDetailController@getProfil');
Route::post('/akunSaya/editProfil','AccountDetailController@postProfil');

Route::get('/akunSaya/alamatpengiriman', 'AccountDetailController@getAlamat');

Route::get('/akunSaya/kartukreditdebit', 'AccountDetailController@getKreditDebit');
Route::post('/akunSaya/postKartu', 'AccountDetailController@postKreditDebit');
Route::post('/akunSaya/hapusKartu', 'AccountDetailController@postHapusKreditDebit');
Route::post('/akunSaya/utamaKartu', 'AccountDetailController@postUtamaKreditDebit');

Route::get('/akunSaya/ubahpassword', 'AccountDetailController@getUbahPassword');
Route::post('/akunSaya/ubahpass', 'AccountDetailController@postUbahPassword');

Route::get('/notifikasi', function(){
    return view('detailAkun.notifikasi.notifikasi');
});
//Route::get('/wishsaya', 'AccountDetailController@getWishSaya')->name('getWishSaya');
Route::get('/wishsaya', 'AccountDetailController@getWishSaya')->name('getWishSaya');
//Route::get('/wishsaya', function(){
//    return view('detailAkun.wishSaya.wishSaya');
//});
Route::get('/transaksisaya', 'AccountDetailController@getTransaksiSaya')->name('getTransaksiSaya');
//Route::get('/transaksisaya', function(){
//    return view('detailAkun.transaksiSaya.transaksiSaya');
//});
Route::get('/transaksisaya/detailtransaksi/{id}', 'AccountDetailController@getDetailTransaksi')->name('getDetailTransaksi');
//Route::get('/transaksisaya/detailtransaksi', function(){
//    return view('detailAkun.transaksiSaya.detailTransaksi');
//});
