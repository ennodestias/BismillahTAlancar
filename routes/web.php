<?php

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

Route::get('/ ', function () {
    return redirect('beranda');
});

//beranda hanya daoat diakses oleh user yg login saja
Route::group(['middleware'=>'auth'],function(){
    
    Route::get("beranda",'Beranda_controller@index');

    Route::get("paket-laundry", 'Paket_controller@index');
    Route::get("paket-laundry/add", 'Paket_controller@add');
    Route::get("paket-laundry/edit/{id}", ['as' => 'paket.edit', 'uses' => 'Paket_controller@edit']);

    Route::get("customer", 'Customer_controller@index');
    Route::get("customer/edit/{id}", ['as' => 'customer.edit', 'uses' => 'Customer_controller@edit']);

    Route::get("karyawan", 'Karyawan_controller@index');

    Route::get("pesanan", 'Pesanan_controller@index');
    Route::get("pesanan/add", 'Pesanan_controller@add');
});


Auth::routes();

//setelah login masuk ke halaman beranda
Route::get('/home', function(){
    return redirect('beranda');
});

//mengarah ke halaman login
Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});