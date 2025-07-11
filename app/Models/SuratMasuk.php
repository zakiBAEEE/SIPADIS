<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk'; // Kalau nama tabel tidak jamak

    protected $primaryKey = 'id'; // default, tapi tetap sebutkan agar eksplisit
    public $incrementing = false; // ini WAJIB, agar Laravel tahu ID bukan auto-increment
    protected $keyType = 'string'; // ini WAJIB, agar Laravel tahu ID berupa string
    protected $fillable = [
        'id',
        'nomor_surat',
        'pengirim',
        'tanggal_surat',
        'tanggal_terima',
        'perihal',
        'klasifikasi_surat',
        'sifat',
        'jenis_pengelolaan',
        'file_path',
    ];

    public function disposisis()
    {
        return $this->hasMany(Disposisi::class, 'surat_id');
    }

}
