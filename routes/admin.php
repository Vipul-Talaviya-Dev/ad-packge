<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'control-panel','as' => 'admin.'], function () {
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('check', 'LoginController@check')->name('check');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => 'adminAuth'], function () {
        // Dashboard Controller
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        // Category Controller
        Route::get('categories', 'CategoryController@index')->name('categories');
        Route::get('category/add', 'CategoryController@add')->name('category.add');
        Route::post('category/create', 'CategoryController@create')->name('category.create');
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('category/{id}/update', 'CategoryController@update')->name('category.update');

        //Offer controller
        Route::get('offers', 'OfferController@index')->name('offers');
        Route::get('offer/add', 'OfferController@add')->name('offer.add');
        Route::post('offer/create', 'OfferController@create')->name('offer.create');
        Route::get('offer/{id}/edit', 'OfferController@edit')->name('offer.edit');
        Route::post('offer/{id}/update', 'OfferController@update')->name('offer.update');
        Route::get('offer/{id}/delete', 'OfferController@delete')->name('offer.delete');

        // Banner Controller
        Route::get('banners', 'BannerController@index')->name('banners');
        Route::get('banner/add', 'BannerController@add')->name('banner.add');
        Route::post('banner/create', 'BannerController@create')->name('banner.create');
        Route::get('banner/{id}/edit', 'BannerController@edit')->name('banner.edit');
        Route::post('banner/{id}/update', 'BannerController@update')->name('banner.update');
        Route::get('banner/{id}/delete', 'BannerController@delete')->name('banner.delete');

        // Product Controller
        Route::get('products', 'ProductController@index')->name('products');
        Route::get('product/add', 'ProductController@add')->name('product.add');
        Route::post('product/create', 'ProductController@create')->name('product.create');
        Route::post('product/insert', 'ProductController@insert')->name('product.insert');
        Route::get('product/{id}/edit', 'ProductController@edit')->name('product.edit');
        Route::post('product/{id}/update', 'ProductController@update')->name('product.update');

    });
});

Route::group(['namespace' => 'Admin', 'as' => 'api.'], function () {
    Route::post('subCategory', 'ProductController@subCategory')->name('subCategory');
});