<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['id', 'name'];

    public function regencies()
    {
        return $this->hasMany(Regency::class, 'province_id', 'id');
    }
}

