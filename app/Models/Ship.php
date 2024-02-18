<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    function rel_to_city(){
        return $this->belongsTo(City::class,'ship_city');
    }
    
    function rel_to_country(){
        return $this->belongsTo(Country::class,'ship_country');
    }
}
