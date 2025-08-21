<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\VisitorPolicy;

use Illuminate\Http\Request;

class VisitorPolicyController extends Controller
{
    public function index()
    {
        $visitor_policies = DB::table('visitor_policies')->get(); // Fetch all visitor_policies
        return view('VisitorPolicy.index', compact('visitor_policies'));
    }


    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                // 'attachment' => 'required|file|mimes:pdf,doc,docx|max:2048', // Allow PDF & DOC up to 2MB
            ]);

            // Handle File Upload
            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/uploads', $filename); // Store in storage/app/public/uploads
            } else {
                $filename = null;
            }

            // Insert Data into Database
            $insert = VisitorPolicy::create([
                'title' => $request->title,
                'description' => $request->description,
                'attachment' => $filename,
            ]);

            // Check if insert was successful
            if ($insert) {
                return redirect()->back()->with('success', 'Policy Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to add policy.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $VisitorPolicy = VisitorPolicy::findOrFail($id);
        $VisitorPolicy->delete();

        return redirect()->back()->with('success', 'Visitor Policy deleted successfully!');
    }

    public function show($id)
    {
        $visitorPolicy = VisitorPolicy::findOrFail($id);
        return view('VisitorPolicy.show', compact('visitorPolicy'));
    }


    public function edit($id)
    {
        $visitorPolicy = VisitorPolicy::findOrFail($id);
        return view('VisitorPolicy.edit', compact('visitorPolicy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'attachment'  => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
        ]);

        $visitorPolicy = VisitorPolicy::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            $visitorPolicy->attachment = $attachmentPath;
        }

        $visitorPolicy->title = $request->title;
        $visitorPolicy->description = $request->description;
        $visitorPolicy->save();

        return redirect()->route('visitor-policy.index')->with('success', 'Visitor Policy updated successfully!');
    }
}
