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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//paket
Route::post('/paket/add', 'Paket_controller@store');
Route::put('/paket/edit/{id}', 'Paket_controller@update');

//customer
Route::post('/customer/add', 'Customer_controller@store');
Route::put('/customer/edit/{id}', 'Customer_controller@update');