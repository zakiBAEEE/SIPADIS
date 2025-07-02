<?php

namespace App\Services;

use App\Models\SuratMasuk;
use Carbon\Carbon;

class SuratRekapitulasiService
{
    public function getChartData($query)
    {
        $data = $query->selectRaw('DATE(tanggal_terima) as tanggal, klasifikasi_surat, COUNT(*) as total')
            ->groupBy('tanggal', 'klasifikasi_surat')
            ->orderBy('tanggal')
            ->get();

        $tanggalList = $data->pluck('tanggal')->unique()->values()->sort()->values();

        $klasifikasiList = ['Umum', 'Pengaduan', 'Permintaan Informasi'];

        $categories = $tanggalList->map(fn($tgl) => \Carbon\Carbon::parse($tgl)->translatedFormat('d M'))->toArray();

        $series = [];

        foreach ($klasifikasiList as $klasifikasi) {
            $dataPerKlasifikasi = [];

            foreach ($tanggalList as $tanggal) {
                $count = $data->firstWhere(
                    fn($item) =>
                    $item->tanggal == $tanggal && $item->klasifikasi_surat == $klasifikasi
                )?->total ?? 0;

                $dataPerKlasifikasi[] = $count;
            }

            $series[] = [
                'name' => $klasifikasi,
                'data' => $dataPerKlasifikasi
            ];
        }

        return [
            'categories' => $categories,
            'series' => $series,
        ];
    }


    public function hitungRekapSurat($query)
    {
        return [
            'total' => (clone $query)->count(),
            'umum' => (clone $query)->where('klasifikasi_surat', 'Umum')->count(),
            'pengaduan' => (clone $query)->where('klasifikasi_surat', 'Pengaduan')->count(),
            'permintaan_informasi' => (clone $query)->where('klasifikasi_surat', 'Permintaan Informasi')->count(),
        ];
    }

}
