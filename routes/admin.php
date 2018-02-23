<?php

// Admin public routes

Route::get('/login', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('/login', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@login')->name('postLogin');
Route::post('/logout', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@logout')->name('logout');

// Admin authenticated routes
Route::group(['middleware' => ['auth:admin','locale']], function () {
    Route::get('/', function () {
        return view('helium::layouts.master');
    })->name('home');

    Route::get('/logs', 'LogController@logs')->name('logs');

    Route::get('/customers', 'Customer\IndexController@index')->name('customer.index');
    Route::get('/customers/datatable', 'Customer\IndexController@datatable')->name('customer.datatable');
    Route::post('/customers/{id}/edit', 'Customer\EditController@edit')->name('customer.edit');

    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        Route::get('/', 'Product\IndexController@index')->name('index');
        Route::get('/create', 'Product\CreateController@create')->name('create');
        Route::post('/', 'Product\CreateController@store')->name('store');
        Route::get('/{id}/edit', 'Product\EditController@edit')->name('edit');
        Route::put('/{id}', 'Product\EditController@update')->name('update');
        Route::delete('/{id}', 'Product\DestroyController@destroy')->name('destroy');
    });


    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', 'Category\IndexController@index')->name('index');
        Route::get('/create', 'Category\CreateController@create')->name('create');
        Route::post('/', 'Category\CreateController@store')->name('store');
        Route::get('/{id}/edit', 'Category\EditController@edit')->name('edit');
        Route::put('/{id}', 'Category\EditController@update')->name('update');
        Route::delete('/{id}', 'Category\DestroyController@destroy')->name('destroy');
    });


    // Contact
    Route::get('/contacts', '\Webup\LaravelHelium\Contact\Http\Controllers\Admin\ContactController@index')->name('contact.index');
    Route::get('/contacts/datatable', '\Webup\LaravelHelium\Contact\Http\Controllers\Admin\ContactController@datatable')->name('contact.datatable');
    Route::get('/contacts/{id}', '\Webup\LaravelHelium\Contact\Http\Controllers\Admin\ContactController@show')->name('contact.show');
    Route::delete('/contacts/{id}', '\Webup\LaravelHelium\Contact\Http\Controllers\Admin\ContactController@destroy')->name('contact.destroy');

    // Settings
    Route::get('/settings', '\Webup\LaravelHelium\Setting\Http\Controllers\SettingController@edit')->name('setting.edit');
    Route::post('/settings', '\Webup\LaravelHelium\Setting\Http\Controllers\SettingController@update')->name('setting.update');
    //
    // // Settings
    // Route::post('/images/upload/{id?}', 'ImageUploaderController@upload')->name('images.upload');
    // Route::post('/files/upload/{id?}', 'FileUploaderController@upload')->name('files.upload');
});
