<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanPengujian extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'pengambilan_sampel',
        'parameter_id',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
    public function sertifikat()
    {
        return $this->hasOne(SertifikatPengujian::class);
    }

    public function sampel()
    {
        return $this->hasOne(SampelPengujian::class, 'permintaan_id', 'id');
    }
    }
