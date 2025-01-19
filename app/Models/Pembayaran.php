<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'permintaan_id',
        'jumlah',
        'status',
        'tanggal_pembayaran',
        'bukti_pembayaran',
    ];
    public function permintaan()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }

}
