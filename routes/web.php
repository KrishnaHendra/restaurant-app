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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'AdminController@index');

Route::get('/coba','CobaController@index');

Route::get('/table','CobaController@table');
Route::get('/about','CobaController@about');
Route::get('/grafik','CobaController@grafik');

Route::get('/pelanggan/tambah','PelangganController@tambah');
Route::post('/pelanggan/store','PelangganController@store');
Route::get('/pelanggan/hapus/{id}','PelangganController@hapus');

Route::post('/pelanggan/update','PelangganController@update');
Route::get('/pelanggan/edit/{id}','PelangganController@edit');
Route::get('/pelanggan/profile','PelangganController@profile');
Route::get('/pelanggan/cari','PelangganController@cari');

Route::get('/masakan','MasakanController@index');
Route::get('/masakan/tambah','MasakanController@tambah');
Route::post('/masakan/store','MasakanController@store');
Route::get('/masakan/hapus/{id}','MasakanController@hapus');
Route::get('/masakan/cari','MasakanController@cari');
Route::post('/masakan/update','MasakanController@update');
Route::get('/masakan/edit/{id}','MasakanController@edit');

Route::get('/minuman','MinumanController@index');
Route::get('/minuman/hapus/{id}','MinumanController@hapus');
Route::post('/minuman/store','MinumanController@store');

// CUSTOMER

Route::get('/customer','CustomerController@index');
Route::post('/cart/pesan','CartController@pesan');

Route::get('/pesanan','PesananController@index');

