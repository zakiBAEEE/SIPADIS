<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SuratMasuks extends Model
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
            ],
            
            // Tambahkan lagi jika perlu
        ]);
    }

    // Override method all()
    public static function all($columns = ['*'])
    {
        return static::dummyData();
    }

    // Override method findOrFail($id)
    public static function findOrFail($id)
    {
        $surat = static::dummyData()->firstWhere('id', $id);

        if (!$surat) {
            throw (new ModelNotFoundException)->setModel(self::class, $id);
        }

        return $surat;
    }
}
