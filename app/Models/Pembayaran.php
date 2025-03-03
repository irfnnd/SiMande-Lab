<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pembayaran extends Model
{
    protected $fillable = [
        'permintaan_id',
        'pelanggan_id',
        'bukti_pembayaran',
        'status',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'keterangan',
        'created_by',
        'updated_by',
    ];
    protected static function boot()
    {
        parent::boot();

        // Saat mengupdate data
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->name;
        });
    }
    public function permintaan()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

}
