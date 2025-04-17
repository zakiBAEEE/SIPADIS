<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/surat-masuk', function () {
    return view('pages.super-admin.surat-masuk');
});
