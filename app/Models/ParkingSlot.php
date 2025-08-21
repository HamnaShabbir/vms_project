<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    use HasFactory;

    protected $table = 'parking_slots';
    protected $fillable = [
        'company_name', // Allows mass assignment for Company Name
        'slot_number',  // Allows mass assignment for Slot Number
    ];
    public function visitor()
    {
        return $this->hasOne(Visitor::class, 'parking_slot_id')
            ->where(function ($query) {
                // Conditions based on visit and exit dates and times
                $query->whereNull('date_of_exit') // No exit recorded
                    ->orWhere('date_of_exit', '>=', now()) // Exit time is in the future
                    ->orWhere(function ($query) {
                    $query->where('date_of_visit', '<=', now()) // The visit date is in the past or today
                        ->where(function ($query) {
                            $query->where('time_of_arrival', '<=', now()->toTimeString()) // Arrival time is past or present
                                ->where('time_of_departure', '>=', now()->toTimeString()); // Departure time is in the future or present
                        });
                });
            });
    }

    /**
     * Get all visitors who have used this parking slot.
     */
    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'parking_slot_id');
    }
}
