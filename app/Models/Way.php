<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    /** @use HasFactory<\Database\Factories\WayFactory> */
    use HasFactory;

    protected $fillable=[
        'name',
        'user_id',
        'status',
        'init',
        'finish'
    ];

    public function points(){
        return $this->hasMany(Point::class);
    }
}
