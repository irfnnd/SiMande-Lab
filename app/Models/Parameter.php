<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'parameter',
        'satuan',
        'metode_uji',
        'wadah',
        'volume_sampel',
        'tarif',
        'keterangan',
    ];

    public static function generateKode(): string
    {
        // Ambil kode terakhir
        $lastParameter = self::latest('id')->first();

        // Tentukan nomor baru
        $number = $lastParameter ? intval(substr($lastParameter->kode, 3)) + 1 : 1;

        // Format menjadi PRM001, PRM002, dst.
        return 'PRM' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}
