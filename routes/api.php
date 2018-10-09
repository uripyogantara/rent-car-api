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


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('car', 'CarController@index');
    Route::post('transaction', 'TransactionController@store');
});
