<?php

use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.super-admin.home');
})->name('surat.home');

Route::get('/surat-masuk', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat-masuk/{id}', [SuratController::class, 'show'])->name('surat.show');

