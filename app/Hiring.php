<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    public function CityName(){
        return $this->belongsTo(District::class,'City');
    }
}
