<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $garded= [];

    //one to one
    public function service_detail(){
        return $this->hasOne(Servicedetail::class);
    }

    //N to N 
    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }
}
