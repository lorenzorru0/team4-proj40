<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/', 'PageController@index')->name('home');

Route::get('/checkout/{id}', 'PaymentController@paymentGet')->name('order.checkout');
Route::post('/checkout/{id}', 'PaymentController@paymentPost')->name('order.checkout.post');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Rotte area Admin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {
    // Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('plates', 'PlatesController');
    Route::put('/plates/{plate}/visibility', 'PlatesController@changeVisibility')->name('plates.visibility');
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/stats', 'OrderController@orderStats')->name('orders.stats');
    Route::get('/orders/delivered', 'OrderController@indexDelivered')->name('orders.index.delivered');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    Route::put('/orders/{order}/delivered', 'OrderController@changeDeliver')->name('orders.delivered');
});

Route::get('/{any}', 'PageController@index')->where('any', '.*');





