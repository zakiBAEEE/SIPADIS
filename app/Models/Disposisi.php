<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class Disposisi extends Model
// {
//     protected $fillable = [
//         'surat_id',
//         'dari_user_id',
//         'ke_user_id',
//         'catatan',
//         'tanggal_disposisi',
//     ];

//     public function suratMasuk() {
//         return $this->belongsTo(SuratMasuk::class, 'surat_id');
//     }
//     public function pengirim()
//     {
//         return $this->belongsTo(User::class, 'dari_user_id');
//     }

//     // Relasi ke user penerima disposisi
//     public function penerima()
//     {
//         return $this->belongsTo(User::class, 'ke_user_id');
//     }
// }



class Disposisi extends Model
{
   protected $fillable = [
        'surat_id',
        'dari_role_id',
        'penerima_type',
        'penerima_id',
        'catatan',
        'tanggal_disposisi',
    ];

    protected $casts = [
        'tanggal_disposisi' => 'datetime',
    ];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_id');
    }

    public function dariRole()
    {
        return $this->belongsTo(Role::class, 'dari_role_id');
    }

    public function penerima()
    {
        return $this->morphTo(); // Bisa divisi atau role
    }

}
