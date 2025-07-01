<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Controllers\SuratMasukController;
use App\Models\SuratMasuk;
use App\Models\Disposisi;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use App\Models\Lembaga;

class DisposisiController extends Controller
{


    public function store(Request $request, $suratId)
    {

        
        $validated = $request->validate([
            'dari_role_id' => 'required|exists:roles,id',
            'penerima' => 'required|string',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|date',
        ]);

        // Pisahkan penerima_type dan penerima_id
        [$type, $id] = explode(':', $request->penerima);

        $typeMap = [
            'Role' => Role::class,
            'Divisi' => Divisi::class,
        ];

        if (!isset($typeMap[$type])) {
            return back()->with('error', 'Tipe penerima tidak valid.');
        }

        Disposisi::create([
            'surat_id' => $suratId,
            'dari_role_id' => $validated['dari_role_id'],
            'penerima_type' => $typeMap[$type],
            'penerima_id' => $id,
            'catatan' => $validated['catatan'],
            'tanggal_disposisi' => $validated['tanggal_disposisi'],
        ]);

        return redirect()->back()->with('success', 'Disposisi berhasil disimpan.');
    }


    public function edit(Disposisi $disposisi)
    {
        $user = auth()->user();
        if ($user->id !== $disposisi->dari_user_id && $user->role->name !== 'Super Admin Surat') {
            abort(403, 'AKSES DITOLAK');
        }

        $users = User::orderBy('name')->get();
        return view('pages.super-admin.disposisi-edit', compact('disposisi', 'users'));
    }


    public function update(Request $request, Disposisi $disposisi)
    {
        // dd($request->all());

        $validated = $request->validate([
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|date',
            'penerima' => 'required|string', // Format: Role:3 atau Divisi:5
        ]);

        // Pisahkan penerima_type dan penerima_id dari format "Role:3"
        [$type, $id] = explode(':', $validated['penerima']);

        $typeMap = [
            'Role' => Role::class,
            'Divisi' => Divisi::class,
        ];

        if (!isset($typeMap[$type])) {
            return redirect()->back()->withInput()->with('error', 'Tipe penerima tidak valid.');
        }

        try {
            $disposisi->update([
                'penerima_type' => $typeMap[$type],
                'penerima_id' => $id,
                'catatan' => $validated['catatan'],
                'tanggal_disposisi' => $validated['tanggal_disposisi'],
            ]);

            return redirect()->route('surat.show', $disposisi->surat_id)
                ->with('success', 'Disposisi berhasil diperbarui.');

        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui disposisi: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui disposisi.');
        }
    }

    public function destroy(Disposisi $disposisi)
    {
        try {
            $disposisi->delete();
            return redirect()->back()->with('success', 'Disposisi berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error('Gagal menghapus disposisi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus disposisi.');
        }
    }

    public function cetak($id)
    {
        $surat = SuratMasuk::with([
            'disposisis.dariRole',
            'disposisis.penerima' // morphTo
        ])->findOrFail($id);

        $lembaga = Lembaga::first();

        return view('pages.super-admin.disposisi-cetak', [
            'surat' => $surat,
            'disposisis' => $surat->disposisis,
            'lembaga' => $lembaga,
        ]);
    }


}
