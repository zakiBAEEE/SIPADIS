<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SuratMasukService;
use App\Services\DisposisisFilterService;

use App\Models\SuratMasuk;
use App\Models\User;

class AgendaController extends Controller
{
    protected $filterService;
    protected $disposisisFilterService;

    public function __construct(SuratMasukService $filterService, DisposisisFilterService $disposisisFilterService)
    {
        $this->filterService = $filterService;
        $this->disposisisFilterService = $disposisisFilterService;  // Simpan service di properti controller
    }


    public function agendaKbu(Request $request)
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
        ]);

        $hasFilters = collect($filters)->filter()->isNotEmpty();

        // Base query
        $query = SuratMasuk::with([
            'disposisis.pengirim.divisi',
            'disposisis.pengirim.role',
            'disposisis.penerima.divisi',
            'disposisis.penerima.role',
        ])->has('disposisis');

        if ($hasFilters) {
            // Use your existing filter function here
            $query = $this->filterService->getSuratMasukWithFilters($filters);
        }

        $suratMasuk = $query->orderBy('tanggal_terima')->paginate(10)->appends($request->query());

        return view('pages.super-admin.agenda-kbu', [
            'suratMasuk' => $suratMasuk,
        ]);
    }


    public function printAgendaKbu(Request $request)
    {
        // Ambil filter dari request
        $filters = $request->only([
            'nomor_agenda',
            'nomor_surat',
            'filter_tanggal_surat',
            'filter_tanggal_terima',
            'pengirim',
            'klasifikasi_surat',
            'sifat',
            'perihal',
        ]);

        // Cek apakah ada filter yang diterapkan
        $hasFilters = collect($filters)->filter()->isNotEmpty();

        // Query untuk surat masuk dengan disposisi
        $query = SuratMasuk::with([
            'disposisis.pengirim.divisi',
            'disposisis.pengirim.role',
            'disposisis.penerima.divisi',
            'disposisis.penerima.role',
        ])->has('disposisis');

        // Terapkan filter jika ada
        if ($hasFilters) {
            $query = $this->filterService->getSuratMasukWithFilters($filters, );
        }

        $suratMasuk = $query->orderBy('tanggal_terima')->get();

        // Tampilkan halaman print agenda KBU
        return view('pages.super-admin.print-agenda-kbu', [
            'suratMasuk' => $suratMasuk,
            'tanggalRange' => null,
        ]);
    }

    public function printAgendaTerima(Request $request)
    {
        // Ambil filter dari request
        $filters = $request->only([
            'nomor_agenda',
            'nomor_surat',
            'filter_tanggal_surat',
            'filter_tanggal_terima',
            'pengirim',
            'klasifikasi_surat',
            'sifat',
            'perihal',
        ]);

        // Cek apakah ada filter yang diterapkan
        $hasFilters = collect($filters)->filter()->isNotEmpty();

        // Query untuk surat masuk dengan disposisi
        $query = SuratMasuk::with([
            'disposisis.pengirim.divisi',
            'disposisis.pengirim.role',
            'disposisis.penerima.divisi',
            'disposisis.penerima.role',
        ])->has('disposisis');

        // Terapkan filter jika ada
        if ($hasFilters) {
            $query = $this->filterService->getSuratMasukWithFilters($filters);
        }

        // Ambil seluruh surat masuk yang sudah difilter (tanpa pagination karena untuk print)
        $suratMasuk = $query->orderBy('tanggal_terima')->get();

        // Filter berdasarkan disposisi kepala
        $suratMasuk = $this->disposisisFilterService->filterByKepalaDisposisi($suratMasuk);

        // Tampilkan halaman print agenda untuk kepala
        return view('pages.super-admin.print-agenda-kepala', [
            'suratMasuk' => $suratMasuk,
            'tanggalRange' => null,
        ]);
    }

}
