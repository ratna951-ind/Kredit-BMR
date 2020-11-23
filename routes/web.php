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
});

// Route MCE & UH
Route::group(['middleware' => ['auth','peran:2,3']], function(){
    Route::get('jadwal','JadwalController@index')->name('jadwal.index');
    Route::get('jadwal/{jadwal}', 'JadwalController@show')->name('jadwal.show');

    Route::get('order', 'OrderController@index')->name('order.index');
    Route::get('order/{order}', 'OrderController@show')->name('order.show');
});