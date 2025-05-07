<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan mengimpor model User

class UserController extends Controller
{
    // Method untuk menampilkan daftar user
    public function index()
    {
        // Mengambil semua user dari database
        $users = User::all();

        // Mengirimkan data users ke view 'users.index'
        return view('pages.super-admin.pegawai', compact('users'));
    }
}
