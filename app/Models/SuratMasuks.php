<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SuratMasuks 
{
    // Simulasi data dummy
    protected static function dummyData(): Collection
    {
       return collect([
    (object)[
        'id' => 1,
        'kode' => '001',
        'nomor_agenda' => '0346/TU/2025',
        'tgl_terima' => '2025-03-01',
        'pengirim' => 'Universitas Multi Data Palembang',
        'tgl_surat' => '2025-02-25',
        'nomor_surat' => 'UMDP/2025/139',
        'perihal' => 'Permohonan Beasiswa',
        'klasifikasi' => 'Umum',
        'sifat' => 'Rahasia',
        'file_path' => "C:\Users\Zaki Raihan\Downloads",
    ],
    (object)[
        'id' => 2,
        'kode' => '002',
        'nomor_agenda' => '0347/TU/2025',
        'tgl_terima' => '2025-03-02',
        'pengirim' => 'Universitas Sriwijaya',
        'tgl_surat' => '2025-02-26',
        'nomor_surat' => 'UNSRI/2025/140',
        'perihal' => 'Undangan Seminar',
        'klasifikasi' => 'Pengaduan',
        'sifat' => 'Penting',
        'file_path' => null,
    ],
    (object)[
        'id' => 3,
        'kode' => '003',
        'nomor_agenda' => '0348/TU/2025',
        'tgl_terima' => '2025-03-03',
        'pengirim' => 'Politeknik Negeri Sriwijaya',
        'tgl_surat' => '2025-02-27',
        'nomor_surat' => 'POLSRI/2025/141',
        'perihal' => 'Permintaan Data Alumni',
        'klasifikasi' => 'Permintaan Informasi',
        'sifat' => 'Segera',
        'file_path' => null,
    ],
    (object)[
        'id' => 4,
        'kode' => '004',
        'nomor_agenda' => '0349/TU/2025',
        'tgl_terima' => '2025-03-04',
        'pengirim' => 'Universitas Bina Darma',
        'tgl_surat' => '2025-02-28',
        'nomor_surat' => 'UBD/2025/142',
        'perihal' => 'Kerja Sama Penelitian',
        'klasifikasi' => 'Umum',
        'sifat' => 'Rutin',
        'file_path' => null,
    ],
    (object)[
        'id' => 5,
        'kode' => '005',
        'nomor_agenda' => '0350/TU/2025',
        'tgl_terima' => '2025-03-05',
        'pengirim' => 'Universitas Muhammadiyah Palembang',
        'tgl_surat' => '2025-03-01',
        'nomor_surat' => 'UMP/2025/143',
        'perihal' => 'Laporan Kegiatan Kampus Merdeka',
        'klasifikasi' => 'Pengaduan',
        'sifat' => 'Segera',
        'file_path' => null,
    ],
]);

    }

    // Override method all()
    public static function all($columns = ['*'])
    {
        return static::dummyData();
    }

    // Override method findOrFail($id)
    public static function find($id)
    {
        $surat = static::dummyData()->firstWhere('id', $id);

        if (!$surat) {
            throw (new ModelNotFoundException)->setModel(self::class, $id);
        }

        return $surat;
    }
}
