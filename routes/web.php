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
    Route::get('/', 'HomeController@index')->name('home'); // Route Home
    Route::get('/image/konsumen/{path}', 'HomeController@imageKonsumen')->name('image.konsumen');
});

// Route Admin
Route::group(['middleware' => ['auth','peran:1']], function(){
    Route::resource('user','UserController')->except(['show']);
    Route::resource('kios','KiosController')->except(['show','edit','update']);
});

// Route MCE
Route::group(['middleware' => ['auth','peran:2']], function(){
    Route::resource('konsumen','KonsumenController')->except(['destroy']);
    Route::resource('pembebanan','PembebananController')->except(['edit', 'update', 'destroy']);

    Route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');
    Route::post('jadwal', 'JadwalController@store')->name('jadwal.store');
});

// Route MCE & UH
Route::group(['middleware' => ['auth','peran:2,3']], function(){
    Route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
});