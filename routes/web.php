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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('permintaan_maggot', App\Http\Controllers\PermintaanMaggotController::class);


Route::resource('produkMaggots', App\Http\Controllers\ProdukMaggotController::class);

Route::post('/get-harga', [App\Http\Controllers\PermintaanMaggotController::class, 'getHarga'])->name('get-harga');



Route::resource('detailPermintaanMaggots', App\Http\Controllers\DetailPermintaanMaggotController::class);

Route::get('detailPermintaanMaggots/create/{id}', [App\Http\Controllers\DetailPermintaanMaggotController::class, 'create'])->name('detailPermintaanMaggots.create');

Route::get('/api/proxy', [App\Http\Controllers\UserController::class, 'proxy']);


