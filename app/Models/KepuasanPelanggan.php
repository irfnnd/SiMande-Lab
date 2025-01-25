<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepuasanPelanggan extends Model
{
    protected $table = 'kepuasan_pelanggans';

    protected $fillable = [
        'pelanggan_id',
        'umur',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'rating',
        'feedback',
    ];
}
