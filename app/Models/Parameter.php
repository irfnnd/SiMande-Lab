<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'created_by',
        'updated_by',
    ];
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
