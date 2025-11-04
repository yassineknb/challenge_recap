<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicedetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Service(){
        return $this->belongsTo(Service::class);
    }
}
