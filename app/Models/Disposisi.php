<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = [
        'surat_id',
        'dari_user_id',
        'ke_user_id',
        'catatan',
        'tanggal_disposisi',
    ];
    
    public function suratMasuk() {
        return $this->belongsTo(SuratMasuk::class);
    }
}
