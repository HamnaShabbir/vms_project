<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now();

        $parkings = ParkingSlot::with([
            'visitors.host',
            'visitors.company',
        ])->get();



        return view('parking.index', compact('parkings'));
    }
}
