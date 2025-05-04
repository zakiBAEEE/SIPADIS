<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Controllers\SuratMasukController;
use App\Models\SuratMasuk;
use App\Models\Disposisi;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($suratId)
    {
        $suratMasuk = SuratMasuk::findOrFail($suratId);
        $disposisi = $suratMasuk->disposisi;
        return view('disposisi.index', compact('disposisi', 'suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $suratId)
    {
        // Validasi input dan ambil hasilnya
        $validated = $request->validate([
            'dari_user_id' => 'nullable|string',
            'ke_user_id' => 'nullable|string',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|date',
        ]);
    
        // Cari surat berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($suratId);
    
        // Tambah surat_id ke data validasi
        $validated['surat_id'] = $suratMasuk->id;
    
        // Simpan disposisi
        Disposisi::create($validated);
    
        // Redirect dengan pesan sukses
        return redirect()->route('disposisi.index', $suratId)
                         ->with('success', 'Disposisi berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
