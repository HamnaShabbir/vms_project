<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get(); // Fetch all companies
        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    // for data insertion
    public function store(Request $request)
    {
        try {
            $request->validate([
                'company_name' => 'required|string|max:255',
                'company_email' => 'required|email|unique:companies,company_email',
                'phone' => 'nullable|string|max:20',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'website' => 'nullable|url',
                'visitor_policy' => 'nullable|string',
                'timezone' => 'nullable|string',
                'status' => 'nullable|string',
                'address' => 'nullable|string',

                // Validation for login info
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            DB::beginTransaction(); // ✅ Start transaction

            // Handle logo upload
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
            }

            // ✅ Use insertGetId() to get the inserted company_id
            $company = new Company();
            $company->company_name = $request->company_name ?? "";
            $company->company_email = $request->company_email ?? "";
            $company->phone = $request->phone ?? "";
            $company->logo = $logoPath;
            $company->website = $request->website ?? "";
            $company->visitor_policy = $request->visitor_policy ?? "";
            $company->timezone = $request->timezone ?? "";
            $company->status = $request->status ?? "Active";
            $company->address = $request->address ?? "";
            $company->created_at = now();
            $company->updated_at = now();
            $company->save();

            // ✅ Ensure company was inserted before creating user
            // Create User
            $user = User::create([
                'name' => $request->company_name . ' Admin',
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'company_id' => $company->id, // Now this is the correct company ID
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Company and Admin User added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->back()->with('success', 'Company deleted successfully!');
    }

    // you want to view particular id row data
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'nullable|email|unique:companies,company_email,' . $id,
            'phone' => 'nullable',
            'website' => 'nullable|url',
            'visitor_policy' => 'nullable|string',
            'timezone' => 'nullable|string',
            'status' => 'required',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $company = Company::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->visitor_policy = $request->visitor_policy;
        $company->timezone = $request->timezone;
        $company->status = $request->status;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('company.index')->with('success', 'Company updated successfully!');
    }

    // old method
    public function companySetting()
    {
        $company = Company::findOrFail(auth()->user()->company_id);
        return view('companies.settings', compact('company'));
    }

    public function updateCompany(Request $request, $compnyId)
    {
        // Validate the incoming request data
        $request->validate([
            'company_website' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the company by ID
        $company = Company::findOrFail($compnyId);

        // Update the company website
        $company->company_email = $request->input('company_email');
        $company->phone = $request->input('company_phone');
        $company->website = $request->input('company_website');
        $company->visitor_policy = $request->input('visitor_policy');
        $company->timezone = $request->input('timezone');
        $company->status = $request->input('status');
        $company->address = $request->input('address');

        // Handle file upload for company logo
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $company->logo = $logoPath;
        }

        // Save the updated company details
        $company->save();

        if (auth()->user()->role == 'Super Admin') {
            // Redirect with a success message
            return redirect()->route('company.index')->with('success', 'Company updated successfully!');
        } else {
            // Redirect with a success message
            return redirect()->route('company.setting', $company->id)->with('success', 'Company updated successfully!');
        }



    }


    // new method
    // public function companySetting()
    // {
    //     // Ensure the authenticated user has a company ID
    //     $company = Company::where('id', Auth::user()->company_id)->first();

    //     // dd(Auth::user()->company_id, $company);
    //     if (!$company) {
    //         return redirect()->back()->with('error', 'Company not found.');
    //     }
    //     return view('companies.settings', compact('company'));
    // }

    public function getDepartments($companyId)
    {
        // Fetch designations for the selected department
        $departments = Department::where('company_id', $companyId)->get();

        // Return hosts as a JSON response
        return response()->json(['departments' => $departments]);
    }
    public function getDesignations($companyId, $departmentId = null)
    {
        // Start the query for designations
        $query = Designation::where('company_id', $companyId);

        // If departmentId is provided, add a condition to filter by department_id
        if (!empty($departmentId)) {
            $query->where('department_id', $departmentId);
        }

        // Execute the query and fetch the results
        $designations = $query->get();

        // Return designations as a JSON response
        return response()->json(['designations' => $designations]);
    }

    public function getHosts($companyId, $departmentId = null, $designationId = null)
    {
        $hosts = User::with('host')
            ->where('role', 'host')
            ->whereHas('host', function ($query) use ($companyId, $departmentId, $designationId) {
                $query->where('company_id', $companyId);

                if (!empty($departmentId)) {
                    $query->where('department_id', $departmentId);
                }

                if (!empty($designationId)) {
                    $query->where('designation_id', $designationId);
                }
            })
            ->get();

        return response()->json(['hosts' => $hosts]);
    }
}
