<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembaga;

class LembagaController extends Controller
{
    /**
     * Tampilkan data lembaga.
     */
    public function index()
    {
        $lembaga = Lembaga::first(); // Asumsikan hanya 1 entri lembaga
        return view('pages.super-admin.lembaga', compact('lembaga'));
    }

    /**
     * Tampilkan form edit data lembaga.
     */
    public function edit()
    {
        $lembaga = Lembaga::first();
        return view('pages.super-admin.edit-lembaga', compact('lembaga'));
    }

    /**
     * Proses update data lembaga.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_kementerian' => 'required|string|max:255',
            'nama_lembaga' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'website' => 'nullable|url',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'kepala_kantor' => 'required|string',
            'nip_kepala_kantor' => 'required|string',
            'jabatan' => 'required|string',
            'logo' => 'nullable|string',
            'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $lembaga = Lembaga::first();
        $lembaga->update($request->all());

        return redirect()->route('lembaga.index')->with('success', 'Data lembaga berhasil diperbarui.');
    }
}
