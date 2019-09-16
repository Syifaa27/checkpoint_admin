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
   // return view('welcome');
   echo "SELAMAT DATANG";
});
Route::get('/satu', function () {
    // return view('welcome');
    echo "ONE";
 });
 Route::get('/dua', function () {
    // return view('welcome');
    echo "TWO";
 });
 Route::get('/tiga', function () {
    // return view('welcome');
    echo "";
 });
 Route::get('/EMPAT', function () {
    // return view('welcome');
    echo "FOUR";
 });
 Route::get('/LIMA', function () {
    // return view('welcome');
    echo "FIVE";
 });
 Route::get('/ENAM', function () {
    // return view('welcome');
    echo "SIX";
 });
 Route::get('/TUJUH', function () {
    // return view('welcome');
    echo "SEVEN";
 });
 Route::get('/DELAPAN', function () {
    // return view('welcome');
    echo "EIGHT";
 });
 Route::get('/SEMBILAN', function () {
    // return view('welcome');
    echo "NINE";
 });


 //1. echo langsung nested atau bersarang
 Route::get('/SEPULUH', function () {
    // return view('welcome');
    echo "TEN";
 });

 //2 manggil view
 Route::get('/SEPULUH', function () {
    return view('telo');
   // lokasi view
});
 Route::get('/nemplate', function () {
   return view('template');
   //lokasi view
});

 //3. manggil controller
 Route:: get('/usang', 'UsangController@index');
/* file controller namanya usangController
nama url : usang
index nama functionnya
*/

 Route::get('/jeruk', 'UsangController@godog');

//baru
Route::get('/nemplate2', 'Kontak@index');

Route::get('/CleaningService', 'CleanerController@index');

Route::resource('kontak', 'contact');
Route::resource('satpam', 'Satpam');
Route::resource('kabupaten', 'kabupaten');
Route::resource('penjualan', 'penjualan');
Route::resource('pembelian', 'pembelian');
Route::resource('barang', 'barang');
Route::get('/', function(){
   return view('index');
});
Route::get('login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('/','Dashboard@index');
Route::get('/logout','Login@logout');



