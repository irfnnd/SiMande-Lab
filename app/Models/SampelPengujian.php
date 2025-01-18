<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampelPengujian extends Model
{
    protected $fillable = [
        'kode_sampel',
        'permintaan_id',
        'kelurahan',
        'kecamatan',
        'kota',
        'tanggal_pengambilan',
        'waktu_pengambilan',
        'petugas_pengambilan',
        'acuan_metode',
        'teknik_pengambilan',
        'wadah',
        'volume_sampel',
        'ph',
        'dhl',
        'suhu_air',
        'do',
        'warna',
        'sanity',
        'yds',
        'cuaca',
        'musim',
        'bau',
        'lab_minyak',
        'suhu_udara',
        'kuat_arus',
        'debit_air',
        'titik_koordinat',
        'alasan_sampel_tidak_diambil',
        'rincian_kondisi',
    ];

    public function permintaanPengujian()
    {
        return $this->belongsTo(PermintaanPengujian::class, 'permintaan_id');
    }
    public static function generateKode(): string
    {
        // Ambil kode terakhir
        $lastSampel = self::latest('id')->first();

        // Tentukan nomor baru
        $number = $lastSampel ? intval(substr($lastSampel->kode_sampel, 4)) + 1 : 1;

        // Format menjadi PRM001, PRM002, dst.
        return 'SMPL' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class, 'parameter_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($sampelPengujian) {
            // Ambil relasi permintaanPengujian
            $permintaanPengujian = $sampelPengujian->permintaanPengujian;

            if ($permintaanPengujian) {
                // Perbarui parameter_id di permintaanPengujian
                $permintaanPengujian->update([
                    'parameter_id' => $sampelPengujian->parameter_id,
                ]);
            }
        });
    }


}
