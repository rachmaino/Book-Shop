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



Auth::routes();
// Route::match(["GET", "POST"], "/register", function(){
//     return redirect("/login");
// })->name("register");



Route::get('/home', 'AdminController@index')->name('home');

Route::get('/penjualan', 'PenjualanController@index')->name('penjualan');

Route::get('/produk', 'ProdukController@index')->name('produk');

Route::get('/buku', 'BukuController@index')->name('bukui');
Route::post('/tambahbuku', 'BukuController@tambah')->name('tambahbuku');
Route::post('/editbuku/{id}', 'BukuController@edit')->name('editbuku');
Route::get('/deletebuku/{id}', 'BukuController@hapus')->name('deletebuku');

Route::get('/kategori', 'KategoriController@index')->name('kategori');
Route::post('/tambahkategori', 'KategoriController@tambah')->name('tambahkategori');
Route::post('/editkategori/{id}', 'KategoriController@edit')->name('editkategori');
Route::get('/deletekategori/{id}', 'KategoriController@hapus')->name('deletekategori');


Route::get('/laporan', 'LaporanController@index')->name('laporan');

Route::get('/', 'FrontController@index');

