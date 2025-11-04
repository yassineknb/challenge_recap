<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->BelongsTo(User::class);

    }

    public function services(){
        $this->BelongsToMany(Service::class,'booking_service');

    }
}
