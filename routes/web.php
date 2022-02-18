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
    return view('welcome');
});

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@addToCart')->name('cart.add');

Route::post('/order/save', 'OrderController@create')->name('order.create');
