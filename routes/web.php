<?php

use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimKerjaController;

// Route::get('/surat-masuk', function () {
//     return ("<h1>Kintil</h1>");
// })->name('surat.home');

Route::get('/', [SuratMasukController::class, 'dashboard'])->name('surat.home');


Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat.show');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat.store');
Route::get('/surat-masuk/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat.edit');
Route::post('/surat-masuk/{surat}', [SuratMasukController::class, 'update'])->name('surat.update');
Route::get('/surat/klasifikasi', [SuratMasukController::class, 'detailByKlasifikasi'])->name('surat.klasifikasi');

Route::get('/surat/cetak-agenda', [SuratMasukController::class, 'cetakAgenda'])->name('surat.cetakAgenda');
Route::get('/surat/print-agenda', [SuratMasukController::class, 'printAgenda'])->name('surat.printAgenda');

// Route khusus untuk cetak agenda terima (versi Kepala LLDIKTI)
Route::get('/surat/cetak-agenda-terima', [SuratMasukController::class, 'cetakAgendaTerima'])->name('surat.cetakAgendaTerima');
Route::get('/cetak-agenda-terima', [SuratMasukController::class, 'printAgenda'])->name('print.agenda.terima');

Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
Route::get('/lembaga/edit', [LembagaController::class, 'edit'])->name('lembaga.edit');
Route::post('/lembaga/update', [LembagaController::class, 'update'])->name('lembaga.update');

Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai.index');

Route::get('/tim-kerja', [TimKerjaController::class, 'index'])->name('timKerja.index');
Route::post('/tim-kerja', [TimKerjaController::class, 'store'])->name('timKerja.store');
Route::post('/tim-kerja/{id}/edit', [TimKerjaController::class, 'update'])->name('timKerja.update');
Route::delete('/tim-kerja/{id}', [TimKerjaController::class, 'destroy'])->name('tim-kerja.destroy');


Route::post('/surat-masuk/{suratId}/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
Route::get('/disposisi/{id}/cetak', [DisposisiController::class, 'cetak'])->name('disposisi.cetak');
