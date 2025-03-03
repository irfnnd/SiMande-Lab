<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pelanggan extends Model
{
    protected $fillable = [
        'user_id',
        'kode_pelanggan',
        'nama_perusahaan',
        'no_telepon',
        'alamat',
        'created_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        // Saat membuat data baru
        static::creating(function ($model) {
            $user = Auth::check() ? Auth::user()->name : 'user';

            $model->created_by = $user;
            $model->updated_by = $user;
        });

        // Saat mengupdate data
        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::user()->name;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function permintaanPengujian()
    {
        return $this->hasMany(PermintaanPengujian::class);
    }

    public static function generateKode(): string
    {
        // Tahun saat ini
        $year = date('Y');

        // Ambil kode terakhir berdasarkan tahun ini
        $lastPelanggan = self::where('kode_pelanggan', 'LIKE', "{$year}%")
            ->latest('kode_pelanggan')
            ->first();

        // Jika ada kode terakhir, ambil nomor urutnya
        if ($lastPelanggan) {
            $lastNumber = (int) substr($lastPelanggan->kode_pelanggan, 4); // Ambil angka setelah tahun
            $nextNumber = $lastNumber + 1;
        } else {
            // Jika belum ada, mulai dari 0001
            $nextNumber = 1;
        }

        // Format kode baru dengan padding 4 digit
        return $year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

}
