<?php

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

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/product/{id}', 'FrontendController@singleProduct')->name('product.single');
Route::post('cart/add', 'ShoppingController@addToCart')->name('cart.add');
Route::get('cart/rapid/add/{id}', 'ShoppingController@rapidAddToCart')->name('cart.rapid.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cartDelete')->name('cart.delete');
Route::get('/cart/increment/{id}/{qty}', 'ShoppingController@increment')->name('cart.increment');
Route::get('/cart/decrement/{id}/{qty}', 'ShoppingController@decrement')->name('cart.decrement');
Route::get('/cart/clear', 'ShoppingController@clearCart')->name('cart.clear');


Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('/cart/checkout', 'CheckoutController@pay')->name('cart.checkout.pay');



Auth::routes();

Route::resource('products', 'ProductsController');

Route::get('/home', 'HomeController@index')->name('home');
