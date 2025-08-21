<?php

namespace App\Http\Controllers;

use App\Models\ParkingStatus;
use Illuminate\Http\Request;

class ParkingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ParkingStatus = ParkingStatus::get(); // Fetch all ParkingStatus

        return view('parkingStatus.index', compact('ParkingStatus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Insert into database
        $insert = ParkingStatus::create([
            'name' => $request->name,
            'color' => $request->color,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('parkingStatus.index')->with('success', 'Status updated successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function update(Request $request, $id)
    {
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'color' => 'required|string',
                'is_active' => 'nullable|boolean',
            ]);

            // Find record
            $status = ParkingStatus::findOrFail($id);

            // Update fields
            $status->update([
                'name' => $request->name,
                'color' => $request->color,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            return redirect()->route('parkingStatus.index')->with('success', 'Status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $status = ParkingStatus::findOrFail($id);
        $status->delete();

        return redirect()->back()->with('success', 'status deleted successfully!');
    }
}
