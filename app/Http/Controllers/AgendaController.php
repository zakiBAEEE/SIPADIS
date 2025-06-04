<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SuratMasukService;

use App\Models\SuratMasuk;
use App\Models\User;

class AgendaController extends Controller
{
    protected $filterService;

    public function __construct(SuratMasukService $filterService)
    {
        $this->filterService = $filterService;
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
            $query = $this->filterService->getSuratMasukWithFilters($filters,);
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
            'cetak-agenda-tanggal-surat',
            'cetak-agenda-tanggal-terima',
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
        $suratMasuk = $this->filterByKepalaDisposisi($suratMasuk);

        // Tampilkan halaman print agenda untuk kepala
        return view('pages.super-admin.print-agenda-kepala', [
            'suratMasuk' => $suratMasuk,
            'tanggalRange' => null,
        ]);
    }


    private function filterByKepalaDisposisi($suratMasuk)
    {
        $kepala = User::whereHas('role', function ($q) {
            $q->where('name', 'Kepala LLDIKTI');
        })->first();

        if ($kepala) {
            $kepalaId = $kepala->id;
            $suratMasuk = $suratMasuk->filter(function ($surat) use ($kepalaId) {
                $firstDisposisi = $surat->disposisis->sortBy('created_at')->first();
                return $firstDisposisi && $firstDisposisi->dari_user_id == $kepalaId;
            })->map(function ($surat) {
                $surat->disposisis = collect([$surat->disposisis->sortBy('created_at')->first()]);
                return $surat;
            });
        } else {
            $suratMasuk = collect();
        }

        return $suratMasuk;
    }
}
