<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', 'Api\UserController@index')->name('api.index');
Route::get('/users/types', 'Api\UserController@typesAll')->name('api.typesAll');
Route::get('/users/typesAll', 'Api\UserController@usersTypes')->name('api.usersTypes');
Route::get('/users/{slug}', 'Api\UserController@show')->name('api.show');
Route::get('/users/{slug}/types', 'Api\UserController@types')->name('api.types');
