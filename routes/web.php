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

//API


Route::get('/', 'HomeController@home')->name('home');

Route::get('/home', function(){
    return redirect('/');
});

Route::get('/tick', function(){
    return view('wish.tick');
});

Route::get('/search', 'WishController@wishSearch');

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

Route::middleware('auth')->group(function (){
    Route::get('/logout','AuthController@logout')->name('logout');

    Route::get('/createWish', 'WishController@getCreateWish');
    Route::post('/createWish', 'WishController@postCreateWish');
    Route::get('/wish/{id}', 'WishController@wishDetail')->name('getWishDetail');
    Route::post('/wish/{id}', 'CartController@addToCart')->name('addToCart');
    Route::post('/buy/{id}', 'CartController@buyWish')->name('buyWish');

    Route::get('/cart', 'CartController@getCart')->name('getCart');
    Route::post('/cart', 'CartController@postCart')->name('postCart');
    Route::post('/cart/delete', 'CartController@deleteCartItem')->name('deleteCartItem');
    Route::get('/cart/deleteAll', 'CartController@deleteAllCartItem')->name('deleteAllCartItem');
    Route::post('/cart/update', 'CartController@updateCartItem')->name('updateCartItem');

    Route::middleware(['payment','alamat'])->group(function (){
        Route::get('/checkout/{id}', 'PaymentController@checkout')->name('getCheckout');
        Route::post('/checkout/{id}', 'PaymentController@postCheckout');
        Route::post('/deletepayment', 'PaymentController@deletePayment')->name('deletePayment');
        Route::post('/undeletepayment', 'PaymentController@undeletePayment')->name('undeletePayment');
    });


    // DETAIL AKUN

    Route::get('/akunSaya/profil','AccountDetailController@getProfil');
    Route::post('/akunSaya/editProfil','AccountDetailController@postProfil');

    //API
    Route::post('/getDetail', 'AccountDetailController@getAlamatDetail');
    Route::get('/getProvinsi', 'AccountDetailController@getProvinsi');
    Route::post('/getKota', 'AccountDetailController@getKota');
    Route::post('/getKecamatan', 'AccountDetailController@getKecamatan');

    Route::get('/akunSaya/alamatpengiriman', 'AccountDetailController@getAlamat');
    Route::post('/akunSaya/postAlamatPengiriman', 'AccountDetailController@postAlamat');
    Route::post('/akunSaya/hapusAlamatPengiriman', 'AccountDetailController@postHapusAlamat');
    Route::post('/akunSaya/postUtamaAlamatPengiriman', 'AccountDetailController@postUtamaAlamat');
    Route::post('/akunSaya/postTempAlamatPengiriman', 'AccountDetailController@postTempAlamat');
    Route::post('/akunSaya/postUbahAlamatPengiriman', 'AccountDetailController@postUbahAlamat');

    Route::get('/akunSaya/kartukreditdebit', 'AccountDetailController@getKreditDebit');
    Route::post('/akunSaya/postKartu', 'AccountDetailController@postKreditDebit');
    Route::post('/akunSaya/hapusKartu', 'AccountDetailController@postHapusKreditDebit');
    Route::post('/akunSaya/utamaKartu', 'AccountDetailController@postUtamaKreditDebit');

    Route::get('/akunSaya/ubahpassword', 'AccountDetailController@getUbahPassword');
    Route::post('/akunSaya/ubahpass', 'AccountDetailController@postUbahPassword');

    Route::get('/notifikasi', 'AccountDetailController@getNotification')->name('getNotification');
    Route::post('/updateNotifikasi', 'AccountDetailController@updateNotification')->name('updateNotification');
    Route::get('/wishsaya', 'AccountDetailController@getWishSaya')->name('getWishSaya');
    Route::get('/transaksisaya', 'AccountDetailController@getTransaksiSaya')->name('getTransaksiSaya');
    Route::get('/transaksisaya/detailtransaksi/{id}', 'AccountDetailController@getDetailTransaksi')->name('getDetailTransaksi');
    Route::get('/transaksisaya/batalkantransaksi/{id}', 'AccountDetailController@batalkanTransaksi')->name('batalkanTransaksi');
});








