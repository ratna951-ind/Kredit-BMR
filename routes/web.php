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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('image/{module}/{file_name}', 'HomeController@image')->name('image');
    Route::get('profil', 'HomeController@profile')->name('profile.index');
    Route::get('profil/edit', 'HomeController@editProfile')->name('profile.edit');
    Route::put('profil/{id}', 'HomeController@updateProfile')->name('profile.update');
});

// Route Admin
Route::group(['middleware' => ['auth','peran:1']], function(){
    Route::resource('user','UserController')->except(['show']);
    Route::resource('kios','KiosController')->except(['show','edit','update']);
});

// Route MCE
Route::group(['middleware' => ['auth','peran:2']], function(){
    Route::resource('konsumen','KonsumenController')->except(['destroy']);
    Route::resource('pembebanan','PembebananController')->except(['create', 'store', 'destroy']);
    Route::get('history/pembebanan', 'PembebananController@history')->name('pembebanan.history');

    Route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');
    Route::post('jadwal', 'JadwalController@store')->name('jadwal.store');

    Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('order/{order}', 'OrderController@update')->name('order.update');
    Route::put('order/{order}/approve', 'OrderController@approve')->name('order.approve');
    Route::put('order/{order}/kontrak', 'OrderController@kontrak')->name('order.kontrak');
});

// Route UH
Route::group(['middleware' => ['auth','peran:3']], function(){
    Route::get('jadwal/{jadwal}/edit', 'JadwalController@edit')->name('jadwal.edit');
    Route::put('jadwal/{jadwal}', 'JadwalController@update')->name('jadwal.update');
    Route::put('jadwal/{jadwal}/tolak', 'JadwalController@tolak')->name('jadwal.tolak');

    Route::get('laporan-order','HomeController@laporanOrder')->name('laporan.order');
    Route::get('/cetak/order/UH/{bulan?}/{tahun?}','HomeController@laporanOrderCetak')->name('laporan.order.cetakUH');
});

// Route Admin
Route::group(['middleware' => ['auth','peran:4']], function(){
    Route::get('order/history', 'OrderController@history')->name('order.history');
    Route::get('order/{order}/accept', 'OrderController@accept')->name('order.accept'); 
    Route::put('order/{order}/accept', 'OrderController@acceptUpdate')->name('order.accept_update');

    Route::get('kasbank', 'KasBankController@index')->name('kas_bank.index');
    Route::post('kasbank', 'KasBankController@store')->name('kas_bank.store');
    
    Route::get('laporan-keuangan','HomeController@laporanKeuangan')->name('laporan.keuangan');
    Route::get('/cetak/keuangan/Admin/{awal?}/{akhir?}','HomeController@laporanKeuanganCetak')->name('laporan.keuangan.cetakAdmin');
    Route::get('/cetak/pencairan/{order}','HomeController@pencairanCetak')->name('pencairan.cetak');
});

// Route MCE & UH
Route::group(['middleware' => ['auth','peran:2,3']], function(){
    Route::get('jadwal','JadwalController@index')->name('jadwal.index');
    Route::get('jadwal/{jadwal}', 'JadwalController@show')->name('jadwal.show');
});

// Route MCE & Admin
Route::group(['middleware' => ['auth','peran:2,4']], function(){
    Route::get('order', 'OrderController@index')->name('order.index');
});

//Route MCE, UH & Admin
Route::group(['middleware' => ['auth','peran:2,3,4']], function(){
    Route::get('order/{order}', 'OrderController@show')->name('order.show');
});

// Route BM & SPV
Route::group(['middleware' => ['auth','peran:5,6']], function(){
    Route::get('laporan/keuangan','HomeController@laporanKeuanganIndex')->name('laporan.keuangan.index');
    Route::get('laporan/keuangan/{kios}','HomeController@laporanKeuanganDetail')->name('laporan.keuangan.detail');
    Route::get('/cetak/keuangan/BM-SPV/{awal?}/{akhir?}/{kios?}','HomeController@laporanKeuanganCetak')->name('laporan.keuangan.cetakBM-SPV');
});

// Route BM
Route::group(['middleware' => ['auth','peran:6']], function(){
    Route::get('laporan/order','HomeController@laporanOrderIndex')->name('laporan.order.index');
    Route::get('laporan/order/{kios}','HomeController@laporanOrderDetail')->name('laporan.order.detail');
    Route::get('/cetak/order/BM/{bulan?}/{tahun?}/{kios?}','HomeController@laporanOrderCetak')->name('laporan.order.cetakBM');
   
});
