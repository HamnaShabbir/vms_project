<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Building;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //     public function index()
    // {
    //     // Fetch all buildings with images
    //     $buildings = Building::all();
        

    //     return view('partials.sidebar', compact('buildings'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $building = Building::first();
    
        return view('buildings.form', compact('building'));
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request, $id = null)
// {
//     try {
//         \Log::info('Building ID:', ['id' => $id]);

//         // Define validation rules
//         $rules = [
//             'name' => 'required|string|max:255',
//             'phone_number' => 'required|string|max:20',
//             'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'address' => 'required|string|max:255',
//             'email' => ['required', 'email', Rule::unique('buildings', 'email')->ignore($id)], // Corrected rule
//         ];

//         // Validate request
//         $validatedData = $request->validate($rules);

//         // Handle file upload
//         if ($request->hasFile('logo')) {
//             $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
//         }

//         // Check if updating or creating
//         if ($id !== null) {
//             // Find the existing building by ID
//             $building = Building::findOrFail($id);

//             // Update building
//             $building->update($validatedData);

//             return redirect()->back()->with('success', 'Building updated successfully!');
//         } else {

//             // Create a new building
//             Building::create($validatedData);

//             return redirect()->back()->with('success', 'Building added successfully!');
//         }
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
//     }
// }


public function store(Request $request, $id = null)
{
    try {
        \Log::info('Building ID:', ['id' => $id]);

        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('buildings', 'email')->ignore($id)],
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Validate request
        $validatedData = $request->validate($rules);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Set timestamps
        $validatedData['created_at'] = Carbon::now();
        $validatedData['updated_at'] = Carbon::now();

        // Check if updating or creating
        if ($id !== null) {
            $building = Building::findOrFail($id);
            $building->update($validatedData);
            return redirect()->back()->with('success', 'Building updated successfully!');
        } else {
            Building::create($validatedData);
            return redirect()->back()->with('success', 'Building added successfully!');
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
    }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
