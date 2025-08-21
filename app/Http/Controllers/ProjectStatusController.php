<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\ProjectStatus;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ProjectStatus = DB::table('project_statuses')->get(); // Fetch all ProjectStatus
        return view('SuperAdmin.pages.StatusSetting.index', compact('ProjectStatus'));
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
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'color' => 'required|string',
                'is_active' => 'nullable|boolean',
            ]);

            // Insert into database
            $insert = ProjectStatus::create([
                'name' => $request->name,
                'color' => $request->color,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            if ($insert) {
                return response()->json(['success' => true, 'message' => 'Status added successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to add status']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong! ' . $e->getMessage()]);
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
    public function edit($id)
{
    $status = ProjectStatus::findOrFail($id);
    return view('SuperAdmin.pages.StatusSetting.edit', compact('status'));
}

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
        $status = ProjectStatus::findOrFail($id);

        // Update fields
        $status->update([
            'name' => $request->name,
            'color' => $request->color,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('project_statuses.index')->with('success', 'Status updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $status = ProjectStatus::findOrFail($id);
        $status->delete();

        return redirect()->back()->with('success', 'status deleted successfully!');
    }
}
