<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Database\Seeders\KategoriSeeder;
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

Route::get('/login',[UserController::class,'login']) -> name('login');
Route::POST('/login',[UserController::class,'authenticateUser']);
Route::get('/registrasi',[UserController::class,'registrasi']) -> name('registrasi');
Route::POST('/registrasi',[UserController::class,'registrasiUser']);

Route::middleware('auth')->group(function(){
    Route::get('/halamanUtama',[BarangController::class,'lihatBarang']) -> name('halamanUtama');
    Route::POST('/logout',[UserController::class,'logout']);

    Route::get('/keranjang',[KeranjangController::class,'keranjang']) -> name('keranjang');
    Route::delete('/hapusKeranjang/{id}',[KeranjangController::class, 'hapusKeranjang']) ->name('hapusKeranjang');
    Route::POST('/tambahKeranjang', [KeranjangController::class, 'tambahKeranjang']) -> name('tambahKeranjang');
    Route::POST('/simpanKeranjang', [KeranjangController::class, 'simpanKeranjang']) -> name('simpanKeranjang');

    Route::get('/order', [OrderController::class, 'lihatOrder']) -> name('lihatOrder');
});


Route::middleware('admin')->group(function(){
    Route::get('/buat',[BarangController::class,'pageBuatBarang']) -> name('form');
    Route::POST('/buat-barang',[BarangController::class,'buatBarang']);

    Route::delete('/barang/{id}', [BarangController::class, 'hapusBarang'])->name('hapusBarang');

    Route::get('/update/{id}',[BarangController::class, 'cariBarangId']);
    Route::patch('/update-barang/{id}', [BarangController::class,'updateBarang']);

    Route::get('/kategori',[KategoriController::class,'kategori']) ->name('kategori');
    Route::POST('/buatKategori',[KategoriController::class,'buatKategori']);
});





