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
// Route::get('/', function () {
//     return view('detailAkun.detailAkun');
// });

Route::get('/', 'HomeController@home')->name('home');

Route::get('/home', function(){
    return redirect('/');
});

Route::get('/login', 'AuthController@showLoginPage');
Route::post('/login', 'AuthController@postLogin')->name('postLogin');
//Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
//Route::post('/register', 'Auth\RegisterController@postRegister');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/wish/{id}', 'WishController@wishDetail');
Route::post('/wish/{id}', 'CartController@addCart');
Route::get('/wish/delete-cart/{cart_item_id}', 'CartController@deleteCart');
Route::get('/cart', 'CartController@cart');
Route::post('/cart', 'CartController@postCart');

Route::get('/checkout', 'TransactionController@checkout');
Route::post('/checkout', 'TransactionController@postCheckout');
