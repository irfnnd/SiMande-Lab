<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusUpdatedMail;
class PermintaanPengujian extends Model
{
    protected $guarded = [];
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

        static::updating(function ($permintaan) {
            if ($permintaan->isDirty('status')) { // Hanya kirim email jika status berubah
                $pelanggan = $permintaan->pelanggan;
                if ($pelanggan && $pelanggan->user) {
                    Mail::to($pelanggan->user->email)->send(new StatusUpdatedMail($permintaan));

                }
            }
        });
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
        $kode_sampel = $this->sampel->kode_sampel;
        return "{$kode_sampel} - {$this->pelanggan->user->name}";
    }
    }
