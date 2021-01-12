<?php

Route::get('/', function () {
    return redirect('shop');
});

Route::resource('shop', 'ProductController', ['only' => ['index', 'show']]);

Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');


Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

Route::post('/click', 'ProductController@click')->name('checkout.click');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('/search', 'ProductController@search')->name('search');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::post('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
