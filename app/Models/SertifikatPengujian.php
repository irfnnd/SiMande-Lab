<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SertifikatPengujian extends Model
{
    protected $fillable = [
        'permintaan_id',
        'nomor_sertifikat',
        'tanggal_terbit',
        'file_path',
        'created_by',
        'updated_by',
    ];

    // Relasi ke model PermintaanPengujian (Many-to-One)
    public function permintaanPengujian()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Saat membuat data baru
        static::creating(function ($model) {
            $model->created_by = Auth::user()->name;
            $model->updated_by = Auth::user()->name;
        });

        // Saat mengupdate data
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->name;
        });
    }

}
