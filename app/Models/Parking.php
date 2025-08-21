<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $table = 'parkings';
    protected $fillable = [
        'company_name',
        'company_address',
        'admin_name',
        'contact_email',
        'phone_number',
        'visitor_name',
        'host_name',
        'visitor_policy',
        'vehicle_type',
        'brand',
        'number_plate',
        'color',
        'select_slot',
        'slot_date',
        'entry_time',
        'expected_exit_time'
    ];
}
