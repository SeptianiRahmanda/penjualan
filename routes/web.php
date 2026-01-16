<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::resource('produk', ProdukController::class);
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan'])
    ->name('laporan.penjualan');
Route::get(
    '/transaksi/export/excel',
    [TransaksiController::class, 'exportExcel']
)->name('transaksi.export.excel');
Route::get(
    '/transaksi/chart',
    [TransaksiController::class, 'chart']
)->name('transaksi.chart');
Route::get(
    '/transaksi/export/pdf',
    [TransaksiController::class, 'exportPdf']
)->name('transaksi.export.pdf');


Route::redirect('/', '/kategori');

