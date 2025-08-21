<?php

namespace App\Http\Controllers;

use App\Models\IdType;
use Illuminate\Http\Request;

class IdTypeController extends Controller
{
    public function index()
    {
        $idTypes = IdType::get();
        return view('IdType.index', compact('idTypes'));
    }

    public function create()
    {
        return view('IdType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $IdType = new IdType();
        $IdType->name = $request->name;
        $IdType->save();
        return redirect()->route('IdType.index')->with('success', 'IdType created successfully!');
    }

    public function edit(IdType $IdType)
    {
        return view('IdType.edit', compact('IdType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $IdType = IdType::find($id);
        $IdType->name = $request->name;
        $IdType->save();
        return redirect()->route('IdType.index')->with('success', 'IdType updated successfully!');
    }

    public function destroy(IdType $IdType)
    {
        $IdType->delete();
        return redirect()->route('IdType.index')->with('success', 'IdType deleted successfully!');
    }
}
