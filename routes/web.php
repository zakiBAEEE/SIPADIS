<?php

use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisposisiController;

Route::get('/', function () {
    return view('pages.super-admin.home');
})->name('surat.home');

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat.show');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat.store');
Route::get('/surat-masuk/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat.edit');
Route::post('/surat-masuk/{surat}', [SuratMasukController::class, 'update'])->name('surat.update');

Route::get('/lembaga', function () {
    return view('pages.super-admin.lembaga');
})->name('organisasi.lembaga');


Route::post('/surat-masuk/{id}/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
