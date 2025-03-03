<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['id', 'regency_id', 'name'];

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id', 'id');
    }
}

