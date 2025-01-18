<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'nama_perusahaan',
        'no_telepon',
        'email',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function permintaanPengujian()
    {
        return $this->hasMany(PermintaanPengujian::class);
    }
}
