<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Role;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Services\SuratMasukService;
use App\Services\DisposisisFilterService;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    protected $suratMasukWithDisposisi;
    protected $disposisisFilterService;

    public function __construct(SuratMasukService $suratMasukWithDisposisi, DisposisisFilterService $disposisisFilterService)
    {
        $this->suratMasukWithDisposisi = $suratMasukWithDisposisi;
        $this->disposisisFilterService = $disposisisFilterService;  // Simpan service di properti controller
    }

    public function agendaKbu(Request $request)
    {
        $query = $this->suratMasukWithDisposisi->suratMasukWithDisposisi($request);

        $suratMasuk = $query->orderBy('tanggal_terima')->paginate(10)->appends($request->query());

        return view('pages.super-admin.agenda-kbu', [
            'suratMasuk' => $suratMasuk,
        ]);
    }

    // public function agendaKepala(Request $request)

    // {
    //     $kepalaRoleId = Role::where('name', 'Kepala LLDIKTI')->value('id');
    //     if (!$kepalaRoleId) {
    //         abort(500, 'Role Kepala LLDIKTI tidak ditemukan.');
    //     }

    //     // Ambil disposisi pertama untuk setiap surat
    //     $firstDisposisiPerSurat = Disposisi::select('surat_id', DB::raw('MIN(id) as id'))
    //         ->groupBy('surat_id');

    //     // Join dengan disposisi asli agar bisa disaring berdasarkan pengirim (Kepala)
    //     $disposisiKepalaIds = DB::table(DB::raw("({$firstDisposisiPerSurat->toSql()}) as sub"))
    //         ->mergeBindings($firstDisposisiPerSurat->getQuery())
    //         ->join('disposisis', 'disposisis.id', '=', 'sub.id')
    //         ->where('disposisis.dari_role_id', $kepalaRoleId)
    //         ->pluck('disposisis.surat_id');

    //     $suratMasuk = SuratMasuk::whereIn('id', $disposisiKepalaIds)
    //         ->orderBy('tanggal_terima', 'desc')
    //         ->paginate(10)
    //         ->appends($request->query());

    //     return view('pages.super-admin.agenda-kepala', compact('suratMasuk'));
    // }

    public function agendaKepala(Request $request)
    {
        $kepalaRoleId = Role::where('name', 'Kepala LLDIKTI')->value('id');
        if (!$kepalaRoleId) {
            abort(500, 'Role Kepala LLDIKTI tidak ditemukan.');
        }

        // Ambil disposisi pertama untuk setiap surat
        $firstDisposisiPerSurat = Disposisi::select('surat_id', DB::raw('MIN(id) as id'))
            ->groupBy('surat_id');

        // Join dengan disposisi untuk ambil hanya disposisi pertama dari Kepala
        $disposisiKepalaIds = DB::table(DB::raw("({$firstDisposisiPerSurat->toSql()}) as sub"))
            ->mergeBindings($firstDisposisiPerSurat->getQuery())
            ->join('disposisis', 'disposisis.id', '=', 'sub.id')
            ->where('disposisis.dari_role_id', $kepalaRoleId)
            ->pluck('disposisis.surat_id');

        // Mulai query SuratMasuk yang sesuai
        $query = SuratMasuk::whereIn('id', $disposisiKepalaIds);

        // Filter: nomor surat
        if ($request->filled('nomor_surat')) {
            $query->where('nomor_surat', 'like', '%' . $request->nomor_surat . '%');
        }

        // Filter: pengirim
        if ($request->filled('pengirim')) {
            $query->where('pengirim', 'like', '%' . $request->pengirim . '%');
        }

        // Filter: tanggal surat
        if ($request->filled('filter_tanggal_surat')) {
            $range = explode(' to ', $request->filter_tanggal_surat);
            if (count($range) === 2) {
                $query->whereBetween('tanggal_surat', [$range[0], $range[1]]);
            } elseif (count($range) === 1) {
                $query->whereDate('tanggal_surat', $range[0]);
            }
        }

        // Filter: tanggal terima
        if ($request->filled('filter_tanggal_terima')) {
            $range = explode(' to ', $request->filter_tanggal_terima);
            if (count($range) === 2) {
                $query->whereBetween('tanggal_terima', [$range[0], $range[1]]);
            } elseif (count($range) === 1) {
                $query->whereDate('tanggal_terima', $range[0]);
            }
        }

        // Filter: klasifikasi surat
        if ($request->filled('klasifikasi_surat')) {
            $query->where('klasifikasi_surat', $request->klasifikasi_surat);
        }

        // Filter: sifat surat
        if ($request->filled('sifat')) {
            $query->where('sifat', $request->sifat);
        }

        // Akhir query
        $suratMasuk = $query->orderBy('tanggal_terima', 'desc')
            ->paginate(10)
            ->appends($request->query());

        return view('pages.super-admin.agenda-kepala', compact('suratMasuk'));
    }


    public function printAgendaKbu(Request $request)
    {
        $query = $this->suratMasukWithDisposisi->suratMasukWithDisposisi($request);
        $suratMasuk = $query->orderBy('tanggal_terima')->get();

        return view('pages.super-admin.print-agenda-kbu', [
            'suratMasuk' => $suratMasuk,
            'tanggalRange' => null,
        ]);
    }

    public function printAgendaKepala(Request $request)
    {
        $query = $this->suratMasukWithDisposisi->suratMasukWithDisposisi($request);

        $suratMasuk = $query->orderBy('tanggal_terima')->get();

        $suratMasuk = $this->disposisisFilterService->filterByKepalaDisposisi($suratMasuk);

        return view('pages.super-admin.print-agenda-kepala', [
            'suratMasuk' => $suratMasuk,
            'tanggalRange' => null,
        ]);
    }

}
