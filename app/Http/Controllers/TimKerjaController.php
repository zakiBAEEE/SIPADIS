<?php

namespace App\Http\Controllers;
use App\Models\Divisi; // Pastikan mengimpor model User
use Illuminate\Http\Request;

class TimKerjaController extends Controller
{
        public function index()
    {
        // $surats = SuratMasuk::orderBy('created_at', 'desc')->get();;
        $timKerja = Divisi::orderBy('created_at', 'desc')->paginate(8); 
        return view('pages.super-admin.tim-kerja', compact('timKerja'));
    }
}
