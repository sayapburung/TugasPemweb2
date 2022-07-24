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
    return view('auth.login');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin|member']], function(){
Route::resource('anggota','AnggotaController');	
Route::resource('pinjaman','PinjamanController');
Route::resource('simpanan','SimpananController');
Route::resource('pembayaran','PembayaranController');
Route::resource('karyawan','UserController');
Route::get('/pdf','PDFController@pdf');

});
