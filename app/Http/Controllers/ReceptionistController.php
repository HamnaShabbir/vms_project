<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Visitor;

class ReceptionistController extends Controller
{

    public function Receptionist()
    {
        return view('receptionist.show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reception = User::where('role', 'receptionist')->orderByDesc('id')->get(); // Fetch all reception
        return view('receptionist.index', compact('reception'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('receptionist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate Input
            $request->validate([
                'name' => 'required|string|max:255',
                // 'role' => 'required|string',
                // 'email' => 'required|email|unique:receptionist,email',
                'phone_number' => 'nullable|string|max:20',
                // 'access_level' => 'required|string',
                // 'shift' => 'required|string',

                // Validation for login info
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Insert Data into Database
            // $insert = DB::table('receptionist')->insert([
            //     'name' => $request->name,
            //     'role' => $request->role,
            //     'email' => $request->email,
            //     'phone_number' => $request->phone_number,
            //     'access_level' => $request->access_level,
            //     'shift' => $request->shift,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'receptionist', // Assuming roles are predefined
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Success Message
            return redirect()->route('receptionist.index')->with('success', 'Receptionist added successfully!');
        } catch (\Exception $e) {
            // Catch and Display Error
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $receptionist = Reception::findOrFail($id);
        return view('receptionist.show', compact('receptionist'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $receptionist = User::findOrFail($id);
        return view('receptionist.edit', compact('receptionist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            // 'email'        => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:20',
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update the user attributes
        $user->update([
            'name'  => $validatedData['name'],
            'phone' => $validatedData['phone_number'],
        ]);

        return redirect()->route('receptionist.index')->with('success', 'Receptionist updated successfully!');
    }


    // public function receptionistPage() {
    //     $visitors = Visitor::all(); // Fetch all visitors
    //     return view('dashboard.receptionist', compact('visitors'));
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reception = User::findOrFail($id);
        $Reception->delete();

        return redirect()->route('receptionist.index')->with('success', 'Receptionist added successfully!');
    }

    public function checkIn($id)
    {
        $visitor = Visitor::with('host')->findOrFail($id);

        // Auto-set clock-in time if not already set
        if (!$visitor->time_of_arrival) {
            $visitor->time_of_arrival = now(); // current timestamp
            $visitor->save();
        }

        return view('receptionist.checkin', compact('visitor'));
    }
}
