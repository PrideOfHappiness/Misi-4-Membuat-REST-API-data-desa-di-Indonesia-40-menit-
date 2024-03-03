<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = ['id', 'code', 'city_code', 'name', 'latitude', 'longitude'];

    public function city(){
        return $this->belongsTo(Cities::class, 'city_code', 'code');
    }

    public function villages(){
        return $this->hasMany(Villages::class, 'district_code', 'code');
    }
}
