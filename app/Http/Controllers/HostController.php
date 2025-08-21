<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Host;
use App\Models\IdType;
use App\Models\ParkingSlot;
use App\Models\ParkingStatus;
use App\Models\User;
use App\Models\VisitorItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\HostsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HostsExport;

class HostController extends Controller
{
    public function index()
    {
        $hosts = Host::with(['company', 'department', 'designation'])->get();
        $users = User::where('company_id', auth()->user()->company_id)->where('role', 'host')->whereHas('host')->with('host.department', 'host.designation')->get();
        return view('hosts.index', compact('users'));
    }

    public function create()
    {
        $statuses = ['active', 'inactive'];
        $departments = Department::where('company_id', auth()->user()->company_id)->get();

        return view('hosts.create', compact('statuses', 'departments'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20', // Correct the field name to 'phone'
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'nullable|string|max:10', // Ensure gender is validated
            'department_id' => 'nullable|exists:departments,id', // Ensure department exists
            'designation_id' => 'nullable|exists:designations,id', // Ensure designation exists
            'extension' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone, // Use 'phone' as the field name in the form
            'email' => $request->email,
            'gender' => $request->gender, // Store the gender field
            'password' => Hash::make($request->password),
            'company_id' => auth()->user()->company_id,
            'role' => 'host', // Assuming roles are predefined
            'extension' => $request->extension,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $latestVisitor = Host::latest()->first();
        $nextId = $latestVisitor ? ((int) str_replace('HOST-', '', $latestVisitor->visitor_id)) + 1 : 1;

        // Create the host record with additional information
        Host::create([
            'user_id' => $user->id,
            'company_id' => auth()->user()->company_id,
            'department_id' => $request->department_id, // Store department_id
            'designation_id' => $request->designation_id, // Store designation_id
            'extension' => $request->extension,
            'status' => $request->status, // Store status
            'host_id' => 'HOST-' . str_pad($nextId, 5, '0', STR_PAD_LEFT), // Store status
        ]);

        // Redirect to the hosts index page with success message
        return redirect()->route('hosts.index')->with('success', 'Host created successfully!');
    }

    public function edit(Host $host)
    {
        $statuses = ['active', 'inactive'];
        $departments = Department::where('company_id', auth()->user()->company_id)->get();

        return view('hosts.edit', compact('host', 'statuses', 'departments'));
    }

    public function update(Request $request, Host $host)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|max:10',
            'department_id' => 'nullable|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'status' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
        ]);

        // Update user details
        $host->user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'extension' => $request->extension,
        ]);

        // Update the host record
        $host->update([
            'department_id' => $request->department_id,
            'designation_id' => $request->designation_id,
            'status' => $request->status,
            'extension' => $request->extension, 
        ]);

        // Redirect with success message
        return redirect()->route('hosts.index')->with('success', 'Host updated successfully!');
    }


    public function destroy(Host $host)
    {
        $host->delete();
        return redirect()->route('hosts.index')->with('success', 'Host deleted successfully!');
    }
    public function getDesignations($departmentId)
    {
        // Fetch designations for the selected department
        $designations = Designation::where('department_id', $departmentId)->get();

        // Return designations as a JSON response
        return response()->json(['designations' => $designations]);
    }
    public function showPublicForm($company_id, $expire_at, $host_id)
    {
        $expire_at = str_replace('_', ' ', $expire_at); // Replace underscores with spaces

        // Now replace the dash in the TIME part only
        // Example: 2025-04-29 06-58-02 => 2025-04-29 06:58:02
        $expire_at = preg_replace('/(\d{2})-(\d{2})-(\d{2})$/', '$1:$2:$3', $expire_at);

        $expireTime = Carbon::parse($expire_at)->addHour();

        // Check if the link has expired
        if (Carbon::now()->greaterThan($expireTime)) {
            return redirect()->route('home')->with('error', 'The link has expired.');
        }

        // If link is still valid, proceed with showing the form
        $companies = Company::all();
        $visitorCompanies = Company::all();
        $parking_slots = ParkingSlot::whereDoesntHave('visitor')->get();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
        $types = ParkingStatus::all();
        $IdTypes = IdType::all();
        $hostCompanyId = old('host_company_id', auth()->user()->company_id); // Default from logged-in user
        $hosts = User::where('company_id', auth()->user()->company_id)->where('role', 'host')->get();
        $departments = Department::where('company_id', auth()->user()->company_id)->get();
        $hostDesignations = Designation::where('company_id', auth()->user()->company_id)->get();
        $items = VisitorItem::all();
        $hostId = $host_id ?? '';


        $hostPhone = old('phone_ext', ''); // Default to empty
        if ($hosts->count() == 1) {
            $hostPhone = $hosts->first()->phone; // Automatically set if only one host is available
        }

        return view('visitor_form', compact(
            'statuses',
            'companies',
            'visitorCompanies',
            'types',
            'hosts',
            'parking_slots',
            'IdTypes',
            'departments',
            'hostDesignations',
            'hostCompanyId',
            'hostPhone',
            'items',
            'parking_slots',
            'hostId',
        ));
    }

    // to show an excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        try {
            Excel::import(new HostsImport, $request->file('file'));
            return back()->with('success', 'File imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    //  to export
    public function export()
    {
        return Excel::download(new HostsExport, 'hosts.xlsx');
    }


    public function downloadTemplate()
    {
        $path = storage_path('app/templates/host_template.xlsx'); // adjust path as needed

        return response()->download($path, 'host_template.xlsx');
    }

}
