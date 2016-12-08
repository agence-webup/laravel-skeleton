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

    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        Route::get('/', 'Admin\Product\IndexController@index')->name('index');
        Route::get('/create', 'Admin\Product\CreateController@create')->name('create');
        Route::post('/', 'Admin\Product\CreateController@store')->name('store');
        Route::get('/{id}/edit', 'Admin\Product\EditController@edit')->name('edit');
        Route::put('/{id}', 'Admin\Product\EditController@update')->name('update');
        Route::delete('/{id}', 'Admin\Product\DestroyController@destroy')->name('destroy');
    });

});
