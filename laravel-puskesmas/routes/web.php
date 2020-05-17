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
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/puskesmas/home', 'PuskesmasController@home');

    Route::get('/puskesmas/dokter', 'PuskesmasController@dokter');

    Route::get('/puskesmas/dokter/detail/{id}', 'PuskesmasController@dokterDetail');

    Route::get('/puskesmas/poliklinik', 'PuskesmasController@poliklinik');

    Route::get('/puskesmas/transaksi', 'PuskesmasController@transaksi');

    Route::get('/puskesmas/transaksi/edit/{id}', 'PuskesmasController@transaksiEdit');

    Route::post('/puskesmas/update', 'PuskesmasController@transaksiUpdate');

    Route::get('/puskesmas/transaksi/add', 'PuskesmasController@transaksiAdd');

    Route::post('/puskesmas/save', 'PuskesmasController@transaksiSave');

    Route::get('/puskesmas/transaksi/delete/{id}', 'PuskesmasController@transaksiDelete');

    Route::get('/puskesmas/logout', 'PuskesmasController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
