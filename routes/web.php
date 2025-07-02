<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

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