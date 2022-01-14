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

//Upload
Route::post('/upload','UploadController@store');

//Auth
Route::get('/login', 'AuthController@showLoginPage')->name('getLogin');
Route::post('/login', 'AuthController@postLogin')->name('postLogin');
Route::get('/register', 'AuthController@showRegisterPage')->name('getRegister');
Route::post('/register', 'AuthController@postRegister') ->name('postRegister');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/createWish', 'WishController@getCreateWish');
Route::post('/createWish', 'WishController@postCreateWish');
Route::get('/wish/{id}', 'WishController@wishDetail');
Route::post('/wish/{id}', 'CartController@addCart');
Route::get('/wish/delete-cart/{cart_item_id}', 'CartController@deleteCart');
Route::get('/cart', 'CartController@cart');
Route::post('/cart', 'CartController@postCart');

Route::get('/checkout', 'TransactionController@checkout');
Route::post('/checkout', 'TransactionController@postCheckout');
