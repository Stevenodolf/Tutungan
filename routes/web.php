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

// Route::get('/', function () {
//     return view('wish.createWish');
// });


Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@postRegister');

Route::get('/wish/{id}', 'WishController@wishDetail');
Route::post('/wish/{id}', 'CartController@addCart');
Route::get('/wish/delete-cart/{cart_id}', 'CartController@deleteCart');
Route::get('/cart', 'CartController@cart');

Route::post('/checkout', 'TransactionController@checkOut');
