<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SuratMasukController extends Controller
{

public function dashboard(Request $request)
{
    // --- Rekap Hari Ini (tetap)
    $todayStart = now()->startOfDay();
    $todayEnd = now()->endOfDay();

    $totalToday = SuratMasuk::whereBetween('created_at', [$todayStart, $todayEnd])->count();
    $umumToday = SuratMasuk::whereBetween('created_at', [$todayStart, $todayEnd])
                ->where('klasifikasi_surat', 'umum')->count();
    $pengaduanToday = SuratMasuk::whereBetween('created_at', [$todayStart, $todayEnd])
                ->where('klasifikasi_surat', 'pengaduan')->count();
    $permintaanInformasiToday = SuratMasuk::whereBetween('created_at', [$todayStart, $todayEnd])
                ->where('klasifikasi_surat', 'permintaan informasi')->count();

    // --- Rekap Berdasarkan Range (optional)
    $tanggalRange = $request->input('tanggal_range');
    $rekapRange = null;

    if ($tanggalRange) {
        $dates = explode(' to ', $tanggalRange);
        if (count($dates) == 2) {
            $start = \Carbon\Carbon::parse($dates[0])->startOfDay();
            $end = \Carbon\Carbon::parse($dates[1])->endOfDay();

            $rekapRange = [
                'total' => SuratMasuk::whereBetween('created_at', [$start, $end])->count(),
                'umum' => SuratMasuk::whereBetween('created_at', [$start, $end])
                    ->where('klasifikasi_surat', 'umum')->count(),
                'pengaduan' => SuratMasuk::whereBetween('created_at', [$start, $end])
                    ->where('klasifikasi_surat', 'pengaduan')->count(),
                'permintaan_informasi' => SuratMasuk::whereBetween('created_at', [$start, $end])
                    ->where('klasifikasi_surat', 'permintaan informasi')->count(),
            ];
        }

        Carbon::setLocale('id');

[$start, $end] = explode(' to ', $tanggalRange);

$tanggalRange = Carbon::parse($start)->translatedFormat('d F Y') . ' - ' . Carbon::parse($end)->translatedFormat('d F Y');
    }

    return view('pages.super-admin.home', compact(
        'totalToday',
        'umumToday',
        'pengaduanToday',
        'permintaanInformasiToday',
        'rekapRange',
        'tanggalRange'
    ));
}


    public function index(Request $request)
{
    $query = SuratMasuk::query();

    if ($request->filled('nomor_agenda')) {
        $query->where('nomor_agenda', 'like', '%' . $request->nomor_agenda . '%');
    }

    if ($request->filled('nomor_surat')) {
        $query->where('nomor_surat', 'like', '%' . $request->nomor_surat . '%');
    }

    if ($request->filled('pengirim')) {
        $query->where('pengirim', 'like', '%' . $request->pengirim . '%');
    }

    if ($request->filled('filter_tanggal_surat')) {
    $range = explode(' to ', $request->filter_tanggal_surat);
    if (count($range) === 2) {
        $query->whereBetween('tanggal_surat', [$range[0], $range[1]]);
    } elseif (count($range) === 1) {
        $query->whereDate('tanggal_surat', $range[0]);
    }
}

if ($request->filled('filter_tanggal_terima')) {
    $range = explode(' to ', $request->filter_tanggal_terima);
    if (count($range) === 2) {
        $query->whereBetween('tanggal_terima', [$range[0], $range[1]]);
    } elseif (count($range) === 1) {
        $query->whereDate('tanggal_terima', $range[0]);
    }
}




    if ($request->filled('perihal')) {
        $query->where('perihal', 'like', '%' . $request->perihal . '%');
    }

    if ($request->filled('klasifikasi_surat')) {
        $query->where('klasifikasi_surat', $request->klasifikasi_surat);
    }

    if ($request->filled('sifat')) {
        $query->where('sifat', $request->sifat);
    }

    $surats = $query->orderBy('created_at', 'desc')->paginate(8)->appends($request->query());

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
    $surat = SuratMasuk::with([
        'disposisis.pengirim.divisi', 
        'disposisis.pengirim.role',      // Jika User punya relasi role() -> belongsTo(Role::class)
        'disposisis.penerima.divisi', 
        'disposisis.penerima.role'
    ])->findOrFail($id);

    $users = User::with(['divisi', 'role'])->get();

    $daftarUser = $users->filter(function ($user) {
        if ($user->divisi) {
            return $user->role && $user->role->name === 'Katimja';
        }
        return true;
    })->map(function ($user) {
        if ($user->divisi && $user->role && $user->role->name === 'Katimja') {
            return [
                'value' => $user->id,
                'display' => $user->divisi->nama_divisi,
            ];
        } else {
            $role = optional($user->role)->name ?? 'Tanpa Role';
            return [
                'value' => $user->id,
                'display' => $role,
            ];
        }
    });

    return view('pages.super-admin.detail-surat', compact('surat', 'daftarUser'));
}


    
    public function edit(SuratMasuk $surat)
    {
        return view('pages.super-admin.edit-surat', compact('surat'));
    }
    
public function update(Request $request, SuratMasuk $surat)
{
    $validated = $request->validate([
        'nomor_agenda'     => 'nullable|string',
        'nomor_surat'      => 'required|string',
        'pengirim'         => 'required|string',
        'tanggal_surat'    => 'required|date',
        'tanggal_terima'   => 'required|date',
        'perihal'          => 'required|string',
        'klasifikasi_surat'=> 'nullable|string',
        'sifat'            => 'nullable|string',
        'file_path'        => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
    ]);

    if ($request->hasFile('file_path')) {
        // Hapus file lama jika ada
        if ($surat->file_path && Storage::disk('public')->exists($surat->file_path)) {
            Storage::disk('public')->delete($surat->file_path);
        }

        // Simpan file baru
        $path = $request->file('file_path')->store('surat', 'public');
        $validated['file_path'] = $path;
    }

    $surat->update($validated);

    return redirect()->route('surat.show', ['id' => $surat->id])->with('success', 'Surat berhasil diperbarui!');
}
    public function destroy(SuratMasuk $suratMasuk)
    {
        
    }
}
