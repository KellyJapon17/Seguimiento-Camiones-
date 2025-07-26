<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    /** @use HasFactory<\Database\Factories\WayFactory> */
    use HasFactory;

    public function points(){
        return $this->hasMany(Point::class);
    }
}
