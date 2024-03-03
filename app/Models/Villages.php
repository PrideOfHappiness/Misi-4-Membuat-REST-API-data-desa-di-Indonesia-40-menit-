<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    use HasFactory;
    protected $table = 'villages';
    protected $fillable = ['id', 'code', 'district_code', 'name', 'latitude', 'longitude', 'other'];

    public function district(){
        return $this->belongsTo(Districts::class, 'district_code', 'code');
    }

}
