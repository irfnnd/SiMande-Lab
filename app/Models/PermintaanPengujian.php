<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanPengujian extends Model
{
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
    public function parameters()
    {
        return $this->belongsTo(Parameter::class)->withDefault();
    }
    public function sertifikat()
    {
        return $this->hasOne(SertifikatPengujian::class);
    }

    public function sampel()
    {
        return $this->hasOne(SampelPengujian::class, 'permintaan_id', 'id');
    }

    public function getDisplayNameAttribute()
    {
        return "{$this->id} - {$this->pelanggan->nama_pelanggan}";
    }
    }
