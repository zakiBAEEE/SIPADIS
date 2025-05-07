<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Controllers\SuratMasukController;
use App\Models\SuratMasuk;
use App\Models\Disposisi;

use App\Models\Lembaga;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($suratId)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request, $suratId)
    {
        $validated = $request->validate([
            'dari_user_id' => 'required|exists:users,id',
            'ke_user_id' => 'required|exists:users,id|different:dari_user_id',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|date',
        ]);
    
        // Inject surat_id ke array yang sudah tervalidasi
        $validated['surat_id'] = $suratId;
    
        Disposisi::create($validated);
        return redirect()->back()->with('success', 'Disposisi berhasil disimpan.');
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

public function cetak($id)
{
    // Ambil surat beserta semua disposisinya sekaligus
    $surat = SuratMasuk::with(['disposisis.pengirim', 'disposisis.penerima'])->findOrFail($id);
    
    // Ambil data lembaga untuk kop surat
    $lembaga = Lembaga::first();

    // Kirim ke view cetak
    return view('pages.super-admin.disposisi-cetak', [
        'surat' => $surat,
        'disposisis' => $surat->disposisis,
        'lembaga' => $lembaga,
    ]);
}


}
