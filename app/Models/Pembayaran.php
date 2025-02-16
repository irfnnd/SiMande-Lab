<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'permintaan_id',
        'pelanggan_id',
        'bukti_pembayaran',
        'status',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'keterangan'
    ];
    public function permintaan()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

}
