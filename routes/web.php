<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.super-admin.home');
});

Route::get('/surat-masuk', function () {
    return view('pages.super-admin.surat-masuk');
});
