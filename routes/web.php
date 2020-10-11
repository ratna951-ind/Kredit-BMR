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
});

// Route Admin
Route::group(['middleware' => ['auth','peran:1']], function(){
    Route::resource('user','UserController')->except(['show']);
    Route::resource('kios','KiosController')->except(['show']);
});

// Route MCE
Route::group(['middleware' => ['auth','peran:2']], function(){
    
});