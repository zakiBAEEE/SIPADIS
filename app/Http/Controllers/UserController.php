<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan mengimpor model User

class UserController extends Controller
{
    // Method untuk menampilkan daftar user
    public function index()
    {
        // Mengambil semua user dari database
         $users = User::orderBy('created_at', 'desc')->paginate(8); // Menggunakan pagination untuk menampilkan 10 user per halaman

        // Mengirimkan data users ke view 'users.index'
        return view('pages.super-admin.pegawai', compact('users'));
    }
}
