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

Route::get('/', function () {
    return view('detailAkun.detailAkun');
});

//Route::get('/', 'HomeController@home');
//
//Route::get('/login', 'Auth\LoginController@getLogin');
//Route::post('/login', 'Auth\LoginController@postLogin');
//
//Route::get('/wish/{id}', 'WishController@wishDetail');
//Route::post('/wish/add-to-cart/{user_id}/{wish_id}', 'CartController@addCart');
//Route::get('/cart', 'CartController@cart');
