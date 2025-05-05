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
    use App\Models\Disposisi;
    use Illuminate\Http\Request;
    
    public function store(Request $request)
    {
        // Validasi input termasuk dari_user_id
        $validated = $request->validate([
            'surat_id' => 'required|exists:surat_masuk,id',
            'dari_user_id' => 'required|exists:users,id',
            'ke_user_id' => 'required|exists:users,id|different:dari_user_id',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|date',
        ]);
    
        // Simpan data disposisi
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
}
