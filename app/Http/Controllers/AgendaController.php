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
    //     // Panggil service untuk mendapatkan query surat dengan disposisi
    //     $query = $this->suratMasukWithDisposisi->suratMasukWithDisposisi($request);

    //     // Lakukan pemrosesan pagination pertama
    //     $suratMasuk = $query->orderBy('tanggal_terima')->paginate(10)->appends($request->query());

    //     // Terapkan filter berdasarkan disposisi kepala, namun pastikan pagination tetap terjaga
    //     $filteredSuratMasuk = $this->disposisisFilterService->filterByKepalaDisposisi($suratMasuk->getCollection());

    //     // Kembalikan pagination dengan data yang sudah difilter
    //     $suratMasuk->setCollection($filteredSuratMasuk);

    //     return view('pages.super-admin.agenda-kepala', [
    //         'suratMasuk' => $suratMasuk,
    //     ]);
    // }



    // public function agendaKepala(Request $request)
    // {
    //     // Ambil ID Role Kepala LLDIKTI
    //     $kepalaRoleId = Role::where('name', 'Kepala LLDIKTI')->value('id');

    //     if (!$kepalaRoleId) {
    //         abort(500, 'Role Kepala LLDIKTI tidak ditemukan.');
    //     }

    //     // Ambil ID surat yang disposisi pertamanya dari Kepala
    //     $suratIds = Disposisi::select('surat_id', DB::raw('MIN(id) as first_disposisi_id'))
    //         ->groupBy('surat_id')
    //         ->pluck('first_disposisi_id');

    //     // Ambil disposisi pertama yang dikirim oleh Kepala
    //     $disposisiKepala = Disposisi::whereIn('id', $suratIds)
    //         ->where('dari_role_id', $kepalaRoleId)
    //         ->pluck('surat_id');

    //     // Ambil surat masuk yang ID-nya ada di daftar tersebut
    //     $query = SuratMasuk::whereIn('id', $disposisiKepala)
    //         ->orderBy('tanggal_terima', 'desc');

    //     // Pagination dan tampilkan
    //     $suratMasuk = $query->paginate(10)->appends($request->query());

    //     return view('pages.super-admin.agenda-kepala', [
    //         'suratMasuk' => $suratMasuk,
    //     ]);
    // }

    // public function agendaKepala(Request $request)
    // {

    //     $kepalaRoleId = Role::where('name', 'Kepala LLDIKTI')->value('id');

    //     if (!$kepalaRoleId) {
    //         abort(500, 'Role Kepala LLDIKTI tidak ditemukan.');
    //     }

    //     // Ambil disposisi PERTAMA dari setiap surat
    //     $firstDisposisiPerSurat = Disposisi::selectRaw('MIN(id) as id')
    //         ->groupBy('surat_id');

    //     // Ambil ID surat dari disposisi PERTAMA yang ditulis oleh Kepala
    //     $suratIds = Disposisi::whereIn('id', $firstDisposisiPerSurat)
    //         ->where('dari_role_id', $kepalaRoleId)
    //         ->pluck('surat_id');

    //     // Ambil surat-surat tersebut
    //     $query = SuratMasuk::whereIn('id', $suratIds)
    //         ->orderBy('tanggal_terima', 'desc');

    //     $suratMasuk = $query->paginate(10)->appends($request->query());

    //     return view('pages.super-admin.agenda-kepala', [
    //         'suratMasuk' => $suratMasuk,
    //     ]);
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

        // Join dengan disposisi asli agar bisa disaring berdasarkan pengirim (Kepala)
        $disposisiKepalaIds = DB::table(DB::raw("({$firstDisposisiPerSurat->toSql()}) as sub"))
            ->mergeBindings($firstDisposisiPerSurat->getQuery())
            ->join('disposisis', 'disposisis.id', '=', 'sub.id')
            ->where('disposisis.dari_role_id', $kepalaRoleId)
            ->pluck('disposisis.surat_id');

        $suratMasuk = SuratMasuk::whereIn('id', $disposisiKepalaIds)
            ->orderBy('tanggal_terima', 'desc')
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
