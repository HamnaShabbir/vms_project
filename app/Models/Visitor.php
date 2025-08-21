<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'visitors';
    // protected $fillable = [
    //     'name', 'phone', 'company_id', 'receiptionist_id', 'entered_at', 'exited_at', 'status_id',
    //     'reason', 'entry_pass_issued', 'is_escorted', 'id_type', 'id_number', 'host_approval','host_id',
    //     'approved_at', 'approved_by', 'id_card_image', 'visitor_photo', 'duration', 'visitor_status',
    //     'visitor_id','parking_slot_id'
    // ];

    // protected $fillable = [
    //     'name', 'designation', 'gender', 'phone', 'vehicle_plate_number',
    //     'reason', 'entered_at', 'exited_at', 'host_approval', 'entry_pass_issued',
    //     'access_card_number', 'is_escorted', 'id_type', 'id_number', 'host_id',
    //     'host_department_id', 'host_designation_id', 'visitor_company_id',
    //     'company_id', 'receiptionist_id', 'visitor_id'
    // ];

    protected $dates = ['date_of_visit', 'date_of_exit', 'time_of_arrival', 'time_of_departure', 'approved_at', 'approved_by'];


    // Calculate duration
    public function getDurationAttribute()
    {
        // If both date_of_visit and time_of_arrival are provided
        if ($this->date_of_visit && $this->time_of_arrival) {
            // Combine start date and time
            $startDateTime = Carbon::parse($this->date_of_visit . ' ' . $this->time_of_arrival);

            // If exit date and time are provided, calculate the difference with the exit time
            // Otherwise, calculate the difference with the current time (now)
            $endDateTime = ($this->date_of_exit && $this->time_of_departure)
                ? Carbon::parse($this->date_of_exit . ' ' . $this->time_of_departure)
                : Carbon::now('Asia/Karachi')->format('Y-m-d H:i:s'); // Use current time if exit details are missing

            // Calculate the duration
            $duration = $startDateTime->diff($endDateTime);

            // Extract days, hours, and minutes
            $days = $duration->d;
            $hours = $duration->h;
            $minutes = $duration->i;

            // Format the output based on the calculated duration
            if ($days == 0) {
                return sprintf('%dh %dm', $hours, $minutes);
            } elseif ($days == 1) {
                return sprintf('1 day %dh %dm', $hours, $minutes);
            } else {
                return sprintf('%d days %dh %dm', $days, $hours, $minutes);
            }
        }

        // Return null if date_of_visit or time_of_arrival is not provided
        return null;
    }





    // Relationships
    public function visitor_company()
    {
        return $this->belongsTo(Company::class, 'visitor_company_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function receptionist()
    {
        return $this->belongsTo(User::class, 'receiptionist_id');
    }

    // public function type()
    // {
    //     return $this->belongsTo(ParkingStatus::class, 'status_id');
    // }
    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }
    public function parkingSlot()
    {

        return $this->belongsTo(ParkingSlot::class, 'parking_slot_id');
    }
    /**
     * Get all of the items for the Visitor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(VisitorItem::class, 'visitor_id');
    }
    public function logs()
    {
        return $this->hasMany(VisitorLogs::class, 'visitor_id');
    }

    // public function items()
    // {
    //     return $this->belongsToMany(VisitorItem::class, 'visitor_item_pivot', 'visitor_id', 'item_id');
    // }





}
