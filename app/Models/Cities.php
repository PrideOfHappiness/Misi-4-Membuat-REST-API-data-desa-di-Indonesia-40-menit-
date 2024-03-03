<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['id', 'code', 'province_code', 'name', 'latitude', 'longitude'];

    public function province(){
        return $this->belongsTo(Provinces::class, 'province_code', 'code');
    }

    public function districts(){
        return $this->hasMany(Districts::class, 'city_code', 'code');
    }
}
