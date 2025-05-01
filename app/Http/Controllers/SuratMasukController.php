<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        // $surats = SuratMasuk::orderBy('created_at', 'desc')->get();;
        $surats = SuratMasuk::orderBy('created_at', 'desc')->paginate(8); 
        return view('pages.super-admin.surat-masuk', compact('surats'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_agenda' => 'nullable|string',
            'nomor_surat' => 'required|string',
            'pengirim' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'perihal' => 'required|string',
            'klasifikasi_surat' => 'nullable|string',
            'sifat' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('surat', 'public');
            $validated['file_path'] = $path; // ini yang disimpan ke DB
        }

        $surat = SuratMasuk::create($validated);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan!');
    }

    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('pages.super-admin.detail-surat', compact('surat'));
    }
    
    public function edit(SuratMasuk $suratMasuk)
    {
        return view('pages.super-admin.edit-surat', compact('suratMasuk'));
    }
    
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        
    }
}
