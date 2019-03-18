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

Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('about-us', 'HomeController@aboutUs')->name('aboutUs');
    Route::get('boxes', 'ProductController@index')->name('products');
    Route::get('product/detail/{productSlug}', 'ProductController@detail')->name('product.detail');
    Route::get('product/add/to/cart/item', 'ProductController@addToCard')->name('addToCard');
	Route::get('carts', 'ProductController@carts')->name('carts');
	Route::post('cart-order-detail', 'ProductController@cartOrderDetail')->name('cartOrderDetail');
	Route::get('order-shipping', 'ProductController@orderShipping')->name('orderShipping');

	Route::get('login', 'LoginController@loginForm')->name('loginForm');
	Route::post('login', 'LoginController@login')->name('login');
	Route::post('signUpCheck', 'LoginController@signUpCheck')->name('signUpCheck');
	Route::post('signUp', 'LoginController@signUp')->name('signUp');

	Route::group(['middleware' => 'userAuth'], function () {

		Route::get('addresses', 'AddressController@index')->name('addresses');
		Route::get('address/{id}/delete', 'AddressController@delete')->name('addressDelete');
		Route::get('address/{id}/edit', 'AddressController@edit')->name('addressEdit');
		Route::post('create-address', 'AddressController@createAddress')->name('createAddress');

	});
});