<?php

use App\Http\Controllers\DataBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('data')->group(function (){
    Route::get('/list-barang', [DataBarangController::class, 'listBarang'])->name('data-barang.index');
    Route::get('/list-barang/create', [DataBarangController::class, 'tambahBarang'])->name('data-barang.tambah');
    Route::post('/list-barang', [DataBarangController::class, 'simpanBarang'])->name('data-barang.simpan');
    Route::get('/list-barang/{idbarang}/detail', [DataBarangController::class, 'detailBarang'])->name('data-barang.detail');
    Route::get('/list-barang/{idbarang}/edit', [DataBarangController::class, 'editBarang'])->name('data-barang.edit');
    Route::put('/list-barang/{idbarang}', [DataBarangController::class, 'updateBarang'])->name('data-barang.update');
    Route::delete('/list-barang/{idbarang}', [DataBarangController::class, 'hapusBarang'])->name('data-barang.hapus');
});