<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // Validasi input dari pengguna
        $request->validate([
            'dari_user_id' => 'required|exists:users,id',  // Validasi user yang mengirim disposisi
            'ke_user_id' => 'required|exists:users,id',    // Validasi user yang menerima disposisi
            'catatan' => 'nullable|string',                 // Validasi catatan, bisa kosong
            'tanggal_disposisi' => 'required|date',         // Validasi tanggal disposisi
        ]);

        // Menemukan surat berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($suratId);

        // Membuat disposisi baru dan menyimpannya ke database
        Disposisi::create([
            'surat_id' => $suratMasuk->id,  // Surat yang terkait
            'dari_user_id' => $request->dari_user_id,  // User yang mengirim disposisi
            'ke_user_id' => $request->ke_user_id,      // User yang menerima disposisi
            'catatan' => $request->catatan,            // Catatan disposisi
            'tanggal_disposisi' => $request->tanggal_disposisi,  // Tanggal disposisi
        ]);

        // Redirect ke halaman surat atau disposisi dengan pesan sukses
        return redirect()->route('disposisi.index', $suratId)->with('success', 'Disposisi berhasil ditambahkan!');
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
