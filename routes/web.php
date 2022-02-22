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

Route::get('/', 'ProductController@index')->name('products');

Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/remove/{id}', 'CartController@removeFromCart')->name('cart.remove');

Route::get('/order/save', 'OrderController@create')->name('order.create');
Route::post('/order/update/{id}', 'OrderController@updateStatus')->name('order.update');
Route::get('/order/show/{id}', 'OrderController@show')->name('order.show');

Route::get('/orders', 'OrderController@index')->name('order.list');



