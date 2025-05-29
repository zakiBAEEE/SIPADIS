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

private function getRekapitulasiSurat($start, $end)
{
    return [
        'total' => SuratMasuk::whereBetween('created_at', [$start, $end])->count(),
        'umum' => SuratMasuk::whereBetween('created_at', [$start, $end])
            ->where('klasifikasi_surat', 'umum')->count(),
        'pengaduan' => SuratMasuk::whereBetween('created_at', [$start, $end])
            ->where('klasifikasi_surat', 'pengaduan')->count(),
        'permintaan_informasi' => SuratMasuk::whereBetween('created_at', [$start, $end])
            ->where('klasifikasi_surat', 'permintaan informasi')->count(),
    ];
}

public function dashboard(Request $request)
{
    $todayStart = now()->startOfDay();
    $todayEnd = now()->endOfDay();

    $totalToday = $this->getRekapitulasiSurat($todayStart, $todayEnd);

    $tanggalRange = $request->input('tanggal_range');
    $rekapRange = null;
    $tanggalRangeDisplay = null;

    // Default: chart tidak menampilkan data (kecuali jika user pilih tanggal)
    $categories = [];
    $series = [
        'umum' => [],
        'pengaduan' => [],
        'permintaan_informasi' => [],
    ];

    if ($tanggalRange && count($dates = explode(' to ', $tanggalRange)) == 2) {
        $start = Carbon::parse($dates[0])->startOfMonth();
        $end = Carbon::parse($dates[1])->endOfMonth();

        $rekapRange = $this->getRekapitulasiSurat($start->copy()->startOfDay(), $end->copy()->endOfDay());
        Carbon::setLocale('id');
        $tanggalRangeDisplay = Carbon::parse($dates[0])->translatedFormat('F Y') . ' - ' . Carbon::parse($dates[1])->translatedFormat('F Y');

        // Ambil data per bulan
        for ($date = $start->copy(); $date->lte($end); $date->addMonth()) {
            $bulanStart = $date->copy()->startOfMonth();
            $bulanEnd = $date->copy()->endOfMonth();

            // Label sumbu X: Nama bulan dan tahun (misal: "Mei 2025")
            $categories[] = $date->translatedFormat('F Y');

            foreach (['umum', 'pengaduan', 'permintaan informasi'] as $jenis) {
                $jumlah = SuratMasuk::whereBetween('created_at', [$bulanStart, $bulanEnd])
                    ->where('klasifikasi_surat', $jenis)
                    ->count();
                $series[$jenis][] = $jumlah;
            }
        }
    }

    return view('pages.super-admin.home', [
        'totalToday' => $totalToday['total'],
        'umumToday' => $totalToday['umum'],
        'pengaduanToday' => $totalToday['pengaduan'],
        'permintaanInformasiToday' => $totalToday['permintaan_informasi'],
        'rekapRange' => $rekapRange,
        'tanggalRange' => $tanggalRangeDisplay ?? 'Per Hari ini',
        'series' => [
            ['name' => 'Umum', 'data' => $series['umum']],
            ['name' => 'Pengaduan', 'data' => $series['pengaduan']],
            ['name' => 'Permintaan Informasi', 'data' => $series['permintaan_informasi']],
        ],
        'categories' => $categories
    ]);
}


public function detailByKlasifikasi(Request $request)
{
    $klasifikasi = $request->input('klasifikasi');
    $tanggalRange = $request->input('tanggal_range');
    $query = SuratMasuk::query();

    if ($klasifikasi) {
        $query->where('klasifikasi_surat', $klasifikasi);
    }

    if ($tanggalRange) {
        $dates = explode(' to ', $tanggalRange);
        if (count($dates) === 2) {
            $start = Carbon::parse($dates[0])->startOfDay();
            $end = Carbon::parse($dates[1])->endOfDay();
            $query->whereBetween('created_at', [$start, $end]);
        }
    } else {
        $query->whereDate('created_at', now()->toDateString()); // Default: Hari ini
    }

    $suratList = $query->orderBy('created_at', 'desc')->get();

    return view('pages.super-admin.klasifikasi-surat', [
        'surats' => $suratList,
        'klasifikasi' => $klasifikasi,
        'tanggalRange' => $tanggalRange ?? 'Hari ini',
    ]);
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

}
$surats = $query->orderBy('created_at', 'desc')->paginate(8)->appends($request->query());

return view('pages.super-admin.surat-masuk', compact('surats'));


}

public function suratMasukTanpaDispo(Request $request)
{
    $query = SuratMasuk::doesntHave('disposisi');

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

    public function cetakAgenda(){
        return view('pages.super-admin.cetak-agenda');
    }

    public function printAgenda(Request $request)
    {
        $filters = $request->only([
            'nomor_agenda',
            'nomor_surat',
            'filter_tanggal_surat',
            'filter_tanggal_terima',
            'pengirim',
            'klasifikasi_surat',
            'sifat',
            'perihal',
            'cetak-agenda-tanggal-surat',
            'cetak-agenda-tanggal-terima',
        ]);
    
        $hasFilters = collect($filters)->filter()->isNotEmpty();
    
        $mode = $request->get('mode'); // 'terima' atau null
    
        if (!$hasFilters) {
            return view($mode === 'terima' 
                ? 'pages.super-admin.print-agenda-terima' 
                : 'pages.super-admin.print-agenda-surat-masuk', [
                    'suratMasuk' => collect(),
                    'tanggalRange' => null,
                ]);
        }
    
        $query = SuratMasuk::with([
            'disposisis.pengirim.divisi',
            'disposisis.pengirim.role',
            'disposisis.penerima.divisi',
            'disposisis.penerima.role',
        ]);
    
        // Apply filters
        if (!empty($filters['nomor_agenda'])) {
            $query->where('nomor_agenda', 'like', '%' . $filters['nomor_agenda'] . '%');
        }
    
        if (!empty($filters['nomor_surat'])) {
            $query->where('nomor_surat', 'like', '%' . $filters['nomor_surat'] . '%');
        }
    
        if (!empty($filters['pengirim'])) {
            $query->where('pengirim', 'like', '%' . $filters['pengirim'] . '%');
        }
    
        if (!empty($filters['klasifikasi_surat'])) {
            $query->where('klasifikasi_surat', $filters['klasifikasi_surat']);
        }
    
        if (!empty($filters['sifat'])) {
            $query->where('sifat', $filters['sifat']);
        }
    
        if (!empty($filters['perihal'])) {
            $query->where('perihal', 'like', '%' . $filters['perihal'] . '%');
        }
    
        // Filter tanggal surat
        if (!empty($filters['cetak-agenda-tanggal-surat']) && str_contains($filters['cetak-agenda-tanggal-surat'], ' to ')) {
            [$startSurat, $endSurat] = explode(' to ', $filters['cetak-agenda-tanggal-surat']);
            $query->whereBetween('tanggal_surat', [$startSurat, $endSurat]);
        }
    
        // Filter tanggal terima
        if (!empty($filters['cetak-agenda-tanggal-terima']) && str_contains($filters['cetak-agenda-tanggal-terima'], ' to ')) {
            [$startTerima, $endTerima] = explode(' to ', $filters['cetak-agenda-tanggal-terima']);
            $query->whereBetween('tanggal_terima', [$startTerima, $endTerima]);
        }
    
        $suratMasuk = $query->orderBy('tanggal_terima')->get();
    
        if ($mode === 'terima') {
            $kepala = User::whereHas('role', function ($q) {
                $q->where('name', 'Kepala LLDIKTI');
            })->first();
        
            if ($kepala) {
                $kepalaId = $kepala->id;
                $suratMasuk = $suratMasuk->filter(function ($surat) use ($kepalaId) {
                    $firstDisposisi = $surat->disposisis->sortBy('created_at')->first();
                    return $firstDisposisi && $firstDisposisi->dari_user_id == $kepalaId;
                })->map(function ($surat) {
                    // Reset disposisis agar hanya disposisi pertama saja yang dikirim ke view
                    $surat->disposisis = collect([$surat->disposisis->sortBy('created_at')->first()]);
                    return $surat;
                });
            } else {
                $suratMasuk = collect();
            }
        }
    
        return view($mode === 'terima' 
            ? 'pages.super-admin.print-agenda-terima' 
            : 'pages.super-admin.print-agenda-surat-masuk', [
                'suratMasuk' => $suratMasuk,
                'tanggalRange' => null,
            ]);
    }
    


    public function cetakAgendaTerima(){
        return view('pages.super-admin.cetak-agenda-terima');
    }



}
