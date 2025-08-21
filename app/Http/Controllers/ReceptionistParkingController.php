<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use Illuminate\Http\Request;
use App\Models\Parking;

class ReceptionistParkingController extends Controller
{
    public function index()
    {
        $parkings = ParkingSlot::with([
            'visitors.host',
            'visitors.company',
        ])->get();

        // dd($parkings);

        return view('parking.index', compact('parkings'));
    }

    public function release($id)
    {
        $parking = Parking::findOrFail($id);
        $parking->status = 'released';
        $parking->released_by = auth()->id();
        $parking->save();

        return redirect()->route('receptionist.parking')->with('success', 'Parking slot released successfully.');
    }

}
