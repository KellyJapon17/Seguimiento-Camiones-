<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /** @use HasFactory<\Database\Factories\PointFactory> */
    use HasFactory;

    protected $fillable=[
        'name',
        'way_id',
        'status',
        'longitud',
        'latitud'
    ];
    
    public function way(){
        return $this->belongsTo(Way::class);
    }

}
