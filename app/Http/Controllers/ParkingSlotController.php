<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingSlotController extends Controller
{
    public function index()
    {
        $slots = ParkingSlot::get();
        return view('parkingSlot.index', compact('slots'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'prefix' => 'required|string|max:10',
            'total_slots' => 'required|integer|min:1'
        ]);

        $prefix = strtoupper($request->prefix);
        $totalSlots = $request->total_slots;

        $slots = [];
        for ($i = 1; $i <= $totalSlots; $i++) {
            $slots[] = ['slot_number' => $prefix . $i, 'created_at' => now(), 'updated_at' => now()];
        }

        ParkingSlot::insert($slots);

        return redirect()->route('parkingSlot.index');
    }
    public function destroy(ParkingSlot $parkingSlot)
    {
        $parkingSlot->delete();
        return redirect()->route('parkingSlot.index')->with('success', 'parking Slot deleted successfully!');
    }
}
