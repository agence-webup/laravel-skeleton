<?php

// Admin public routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Authentication Routes
    Route::get('/auth/login', ['as' => 'auth.login', 'uses' => 'Admin\AuthController@showLoginForm']);
    Route::post('/auth/login', ['as' => 'auth.postLogin', 'uses' => 'Admin\AuthController@login']);
    Route::get('/auth/logout', ['as' => 'auth.logout', 'uses' => 'Admin\AuthController@logout']);
});

// Admin authenticated routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {
    Route::get('/', function (\Illuminate\Http\Request $request) {
        // dd($request->user('admin'));
        return view('admin.layouts.master');
    });
    Route::get('/customers', 'Admin\Customer\IndexController@index')->name('customer.index');


    Route::get('/products', 'Admin\Product\IndexController@index')->name('product.index');
});
