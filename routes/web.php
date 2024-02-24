<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// 
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index')->middleware('auth');
Route::get('/create-barang', [BarangController::class, 'create'])->name('barang.create')->middleware('auth');
Route::post('/create-barang', [BarangController::class, 'store'])->name('barang.store')->middleware('auth');
Route::get('/edit-barang/{uuid}', [BarangController::class, 'edit'])->name('barang.edit')->middleware('auth');
Route::put('/edit-barang/{uuid}', [BarangController::class, 'update'])->name('barang.update')->middleware('auth');
Route::delete('/delete-barang', [BarangController::class, 'destroy'])->name('barang.destroy')->middleware('auth');
// 
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index')->middleware('auth');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store')->middleware('auth');

Route::get('/log', [LogController::class, 'index'])->name('log.index')->middleware('auth');
Route::get('/detail-transaksi', [DetailTransaksiController::class, 'index'])->name('detail-transaksi.index')->middleware('auth');
Route::get('/detail-transaksi/{uuid}', [DetailTransaksiController::class, 'detail'])->name('detail-transaksi.detail')->middleware('auth');
Route::get('/print-transaksi/{uuid}', [DetailTransaksiController::class, 'print'])->name('detail-transaksi.print')->middleware('auth');
