<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/exchange');
});

Route::group(['prefix' => '/exchange'], function () {
    Route::get('/','ExchangeController@exchangeStore');
    Route::get('/order','ExchangeController@exchange');
    Route::get('/complete','ExchangeController@exchangeComplete');
});
Route::group(['prefix' => '/currencies'], function () {
    Route::get('/list','ExchangeController@currencies');
});
