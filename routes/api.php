<?php

use Illuminate\Http\Request;

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
Route::post('login', 'AuthUserController@login');
Route::post('register', 'AuthUserController@register');
Route::get('store', 'StoreController@index');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('car', 'CarController@index');
    Route::get('car/store', 'CarController@storeCars');
    Route::post('transaction', 'TransactionController@store');
    Route::get('transaction', 'TransactionController@index');
    Route::get('store/{id}/car', 'CarController@showByStore');
    Route::get('transaction/store', 'TransactionController@storeTransactions');
});
