<?php

Route::group([
    'middleware' => ['web'],
    'namespace' => '\App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/login', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@showLoginForm')->name('login');
    Route::post('/login', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@login')->name('postLogin');
    Route::post('/logout', '\Webup\LaravelHelium\Core\Http\Controllers\AuthController@logout')->name('logout');

    Route::group(['middleware' => 'admin.auth:admin'], function () {
        Route::get('', "PagesController@home")->name('home');

        // {{ Helium Crud }} 
        // Don't remove previous line if you are using larave-helium crud generator
    });
});
