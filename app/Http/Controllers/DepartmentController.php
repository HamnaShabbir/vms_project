<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('company')->where('company_id', auth()->user()->company_id)->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->company_id = auth()->user()->company_id;
        $department->save();
        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $department = Department::find($id);
        $department->name = $request->name;
        $department->company_id = auth()->user()->company_id;
        $department->save();
        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
