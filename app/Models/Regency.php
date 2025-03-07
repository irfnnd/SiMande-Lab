<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regencies';
    protected $fillable = ['id', 'province_id', 'name'];

    public function districts()
    {
        return $this->hasMany(District::class, 'regency_id', 'id');
    }
}

