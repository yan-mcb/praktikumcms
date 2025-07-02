<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {return view('welcome');});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('daftarProduk')->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/produk/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('createProduk');

    Route::post('/produk/create', [App\Http\Controllers\ProdukController::class, 'store'])->name('storeProduk');

    Route::get('/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'edit'])->name('editProduk');

    Route::put('/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'update'])->name('updateProduk');

    Route::get('/produk/{id}/delete', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('deleteProduk');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('daftarTransaksi');

    Route::get('/transaksi/create', [App\Http\Controllers\TransaksiController::class, 'create'])->name('createTransaksi');

    Route::post('/transaksi/create', [App\Http\Controllers\TransaksiController::class, 'store'])->name('storeTransaksi');

    Route::get('/transaksi/{id}/edit', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('editTransaksi');

    Route::put('/transaksi/{id}/edit', [App\Http\Controllers\TransaksiController::class, 'update'])->name('updateTransaksi');

    Route::get('/transaksi/{id}/delete', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('deleteTransaksi');
    //Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
});
