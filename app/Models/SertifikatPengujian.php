<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikatPengujian extends Model
{
    protected $fillable = [
        'permintaan_id',
        'nomor_sertifikat',
        'tanggal_terbit',
        'file_path',
    ];

    // Relasi ke model PermintaanPengujian (Many-to-One)
    public function permintaanPengujian()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }

}
