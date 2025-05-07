<?php

use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.super-admin.home');
})->name('surat.home');

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat.show');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat.store');
Route::get('/surat-masuk/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat.edit');
Route::post('/surat-masuk/{surat}', [SuratMasukController::class, 'update'])->name('surat.update');

Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
Route::get('/lembaga/edit', [LembagaController::class, 'edit'])->name('lembaga.edit');
Route::post('/lembaga/update', [LembagaController::class, 'update'])->name('lembaga.update');

Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai.index');


Route::get('/tim-kerja', function () {
    return view('pages.super-admin.tim-kerja');
})->name('organisasi.timKerja');

Route::post('/surat-masuk/{suratId}/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
Route::get('/disposisi/{id}/cetak', [DisposisiController::class, 'cetak'])->name('disposisi.cetak');
