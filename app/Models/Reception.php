<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;

    protected $table = 'receptionist';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'access_level',
        'shift',
        'role',
    ];
}
