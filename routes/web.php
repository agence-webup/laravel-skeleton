<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/catalog/{slug?}', 'CatalogController@index')->name('catalog')->where(['slug' => '.+']);
Route::get('/product/{slug}', 'CatalogController@product')->name('catalog.product')->where(['slug' => '.*']);

Route::group(['prefix' => 'cart', 'namespace' => 'Cart'], function () {
    Route::get('', 'CartController@index')->name('cart.index');

    Route::post('products', 'ProductController@store')->name('products.store');
    Route::put('products/{id}', 'ProductController@update')->name('products.update');
    Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

    Route::post('coupons', 'CouponController@store')->name('coupons.store');
    Route::delete('coupons/{id}', 'CouponController@destroy')->name('coupons.destroy');

    Route::get('/order', 'OrderController@create')->name('order.create');
    Route::post('/order', 'OrderController@store')->name('order.store');
    Route::get('/payment', 'PaymentController@index')->name('payment.index');
    Route::get('/success', 'PaymentController@success')->name('payment.success');
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer'], function () {
    // Controllers Within The "App\Http\Controllers\Customer" Namespace

    // Authentication Routes...
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('postLogin');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    // Forgot Password Routes...
    Route::get('/forgot-password', 'ForgotPasswordController@showForgotPasswordForm')->name('forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@forgotPassword')->name('postForgotPassword');

    // Reset Password Routes...
    Route::get('/reset-password', 'ResetPasswordController@showResetPasswordForm')->name('resetPassword');
    Route::post('/reset-password', 'ResetPasswordController@resetPassword')->name('resetPassword');

    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Customer's Email Routes
    Route::get('/email', 'EmailController@edit')->name('email.edit');
    Route::post('/email', 'EmailController@update')->name('email.update');
    Route::get('/email/send-verification', 'EmailController@sendVerification')->name('email.sendVerification');
    Route::get('/email/verify', 'EmailController@verify')->name('email.verify');

    // Customer's invoices Routes...
    Route::get('/address', 'AddressController@edit')->name('address.edit');
    Route::post('/address', 'AddressController@update')->name('address.update');

    // Customer's invoices Routes...
    Route::get('/orders', 'OrderController@index')->name('order.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('order.show');
});
