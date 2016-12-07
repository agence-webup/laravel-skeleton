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

    Route::get('/products', 'Admin\ProductController@index')->name('product.index');
    Route::get('/products/create', 'Admin\ProductController@create')->name('product.create');
    Route::post('/products', 'Admin\ProductController@store')->name('product.store');
    Route::get('/products/{id}/edit', 'Admin\ProductController@edit')->name('product.edit');
    Route::put('/products/{id}', 'Admin\ProductController@update')->name('product.update');
    Route::delete('/products/{id}', 'Admin\ProductController@destroy')->name('product.destroy');
});
