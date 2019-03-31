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
    Route::get('contact-us', 'HomeController@contactUs')->name('contactUs');
    Route::post('contact-us', 'HomeController@contactAdd')->name('contactAdd');
    Route::post('inquiry', 'HomeController@inquiry')->name('inquiry');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::get('terms-condition', 'HomeController@termsCondition')->name('termsCondition');
    Route::get('shop/{slug}/products', 'ProductController@index')->name('products');
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
		Route::get('my-orders', 'UserController@index')->name('myAccount');
		Route::get('my-profile', 'UserController@profile')->name('myProfile');
		Route::post('my-update', 'UserController@profileUpdate')->name('profileUpdate');


		Route::post('order-shipping-detail', 'ProductController@shippingDetail')->name('shippingDetail');
		Route::get('payment', 'ProductController@payment')->name('payment');
		Route::post('order-place', 'ProductController@orderPlace')->name('order-place');
		Route::get('thanks', 'ProductController@thanks')->name('thanks');

		Route::get('addresses', 'AddressController@index')->name('addresses');
		Route::get('address/{id}/delete', 'AddressController@delete')->name('addressDelete');
		Route::get('address/{id}/edit', 'AddressController@edit')->name('addressEdit');
		Route::post('create-address', 'AddressController@createAddress')->name('createAddress');

	});
	Route::get('logout', 'UserController@logout')->name('logout');
});