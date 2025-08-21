<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::with('company')->where('company_id',auth()->user()->company_id)->get();
        $departments = Department::with('company')->where('company_id',auth()->user()->company_id)->get();

        return view('designations.index', compact('designations','departments'));
    }

    public function create()
    {
        
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255'
        ]);

        $designation= new Designation();
        $designation->name = $request->name;
        $designation->department_id = $request->department_id;
        $designation->company_id = auth()->user()->company_id;
        $designation->save();
        return redirect()->route('designations.index')->with('success', 'Designation created successfully!');
    }

    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',

        ]);

        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->department_id = $request->department_id;
        $designation->company_id = auth()->user()->company_id;
        $designation->save();
        return redirect()->route('designations.index')->with('success', 'Designation updated successfully!');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully!');
    }
}