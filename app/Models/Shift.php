<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'shift_name',
        'shift_short_code',
        'shift_start_time',
        'shift_end_time',
        'late_mark_after_minutes',
        'max_late_work_time',
        'early_clock_in_minutes',
        'max_checkin_allowed',
        'color',
        'upload_image',
    ];
}
