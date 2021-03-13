<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/barang', [BarangController::class, 'index'])->name('index.barang');
    Route::get('/barang/buat-data-barang', [BarangController::class, 'create'])->name('create.barang');
    Route::post('/barang', [BarangController::class, 'store'])->name('store.barang');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('edit.barang');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('update.barang');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('delete.barang');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('index.transaksi');
    Route::get('/transaksi/buat-transaksi', [TransaksiController::class, 'create'])->name('create.transaksi');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('store.transaksi');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('edit.transaksi');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('update.transaksi');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('delete.transaksi');


    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/export-barang', [HomeController::class, 'exportBarang'])->name('export.barang');
    Route::get('/export-transaksi', [HomeController::class, 'exportTransaksi'])->name('export.transaksi');
});
