<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingStatus extends Model
{
    protected $table = "parking_status";
    protected $fillable = [
        'name',
        'color',
        'is_active',
    ];
}
