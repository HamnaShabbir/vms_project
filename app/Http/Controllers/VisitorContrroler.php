<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\IdType;
use App\Models\ParkingSlot;
use App\Models\ParkingStatus;
use App\Models\User;
use App\Models\Visitor;
use App\Models\VisitorLogs;
use App\Models\Host;
use App\Models\VisitorItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;

class VisitorContrroler extends Controller
{
    /**
     * Display a listing of the visitors.
     */
    public function index()
    {
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
        $statusColors = [
            'Pending' => 'orange',
            'Approved' => 'green',
            'Rejected' => 'red',
            'Exited' => 'gray',
        ];
        $visitors = Visitor::latest()->paginate(10);
        return view('visitors.index', compact('visitors', 'statuses', 'statusColors'));
    }

    /**
     * Show the form for creating a new visitor.
     */
    //public function create()
    // {
    //     $parkingSlots = ParkingSlot::whereDoesntHave('visitor')->get();
    //     $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
    //     $types = ParkingStatus::all();
    //     $IdTypes = IdType::all();
    //     $companies = Company::all();

    //     $hosts = User::where('company_id', auth()->user()->company_id)->where('role', 'host')->get();
    //     $departments = Department::where('company_id', auth()->user()->company_id)->get();
    //     $hostDesignations = Designation::where('company_id', auth()->user()->company_id)->get();
    //     $hostCompanyId = auth()->user()->company_id; // Assuming host's company is the same as the logged-in user's company
    //     return view('visitors.create', compact('statuses', 'companies', 'types', 'hosts', 'parkingSlots', 'IdTypes', 'departments', 'hostDesignations','hostCompanyId'));
    // }

    //     public function create()
    // {
    //     $user = auth()->user(); // Ensure the user is authenticated

    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
    //     }

    //     $parkingSlots = ParkingSlot::whereDoesntHave('visitor')->get();
    //     $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
    //     $types = ParkingStatus::all();
    //     $IdTypes = IdType::all();
    //     $companies = Company::all();

    //     // Fetch hosts related to the logged-in user's company
    //     $hosts = User::where('company_id', $user->company_id)->where('role', 'host')->get();

    //     $departments = Department::where('company_id', $user->company_id)->get();
    //     $hostDesignations = Designation::where('company_id', $user->company_id)->get();
    //     $hostCompanyId = $user->company_id;
    //     $hostPhone = $user->phone;

    //     // Debugging
    //     // dd($hosts); // This will dump the data and stop execution

    //     return view('visitors.create', compact(
    //         'statuses', 'companies', 'types', 'hosts', 'parkingSlots',
    //         'IdTypes', 'departments', 'hostDesignations', 'hostCompanyId', 'hostPhone'
    //     ));
    // }
    /**
     * Store a newly created visitor.
     */
    // public function store(Request $request)
    // {
    //     // Fetch host details
    //     $host = User::find($request->host_id);

    //     if (!$host) {
    //         return back()->withErrors(['host_id' => 'Invalid host selected.']);
    //     }

    //     // Assign visitor's company ID, department, and host designation dynamically
    //     $request->merge([
    //         'company_id' => $request->host_company_id, // Assign company from host
    //         'visitor_company_id' => $host->company_id, // Assign company from host
    //         'host_department_id' => $host->department_id, // Assign department from host
    //         'host_designation_id' => $host->designation_id, // Assign designation from host
    //         'name' => $host->name,
    //     ]);
    //     dd($request->all());
    //     // Validation rules
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'designation' => 'nullable|string|max:255',
    //         'visitor_company_id' => 'required|exists:companies,id',
    //         'host_department_id' => 'required|exists:departments,id', // Added host department
    //         'host_designation_id' => 'required|exists:designations,id', // Added host designation
    //         'gender' => 'nullable|in:Male,Female',
    //         'phone' => 'nullable|numeric',
    //         'vehicle_plate_number' => 'nullable|string|max:255',
    //         'items_carried' => 'nullable|string|max:255',
    //         'reason' => 'nullable|string|max:255',
    //         'host_name' => 'nullable|string|max:255',
    //         'entered_at' => 'nullable|date',
    //         'exited_at' => 'nullable|date|after_or_equal:entered_at',
    //         'host_approval' => 'nullable|in:Yes,No',
    //         'entry_pass_issued' => 'nullable|in:Yes,No',
    //         'access_card_number' => 'nullable|string|max:255',
    //         'is_escorted' => 'nullable|in:Yes,No',
    //         'id_type' => 'nullable|in:CNIC,Passport,Other',
    //         'id_number' => 'nullable|string|max:255',
    //         'id_card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'visitor_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Create a new visitor record
    //     $visitor = new Visitor();
    //     $visitor->name = $request->name;
    //     $visitor->designation = $request->designation;
    //     $visitor->gender = $request->gender;
    //     $visitor->phone = $request->phone;
    //     $visitor->vehicle_plate_number = $request->vehicle_plate_number;
    //     $visitor->reason = $request->reason;

    //     $visitor->host_designation_id = $request->host_designation_id;
    //     $visitor->host_department_id = $request->host_department_id; // New field for host department



    //     $visitor->host_name = $request->host_name;
    //     $visitor->entered_at = $request->entered_at ?? now('Asia/Karachi');
    //     $visitor->exited_at = $request->exited_at;
    //     $visitor->host_approval = $request->host_approval ?? 'No';
    //     $visitor->entry_pass_issued = $request->entry_pass_issued ?? 'No';
    //     $visitor->access_card_number = $request->access_card_number;
    //     $visitor->is_escorted = $request->is_escorted ?? 'No';
    //     $visitor->id_type = $request->id_type;
    //     $visitor->visitor_id = $request->visitor_id;
    //     $visitor->company_id = $request->visitor_company_id; // Assigned from host company
    //     $visitor->department_id = $request->department_id;
    //     $visitor->id_number = $request->id_number;

    //     if (auth()->check() && auth()->user()->role == 'host') {
    //         $visitor->host_id = auth()->user()->id;
    //     } else {
    //         $visitor->host_id = $request->host_id;
    //     }

    //     $visitor->receiptionist_id = auth()->user()->id ?? null;

    //     if ($request->hasFile('id_card_image')) {
    //         $visitor->id_card_image = $request->file('id_card_image')->store('visitor_id_cards', 'public');
    //     }

    //     if ($request->hasFile('visitor_photo')) {
    //         $visitor->visitor_photo = $request->file('visitor_photo')->store('visitor_photos', 'public');
    //     }

    //     $visitor->save();

    //     if ($request->items_carried) {
    //         $items = array_map('trim', explode(',', $request->items_carried));
    //         foreach ($items as $item) {
    //             $visitor->items()->create(['item' => $item]);
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Visit record has been created successfully.');
    // }











    public function create()
    {
        $user = auth()->user(); // Ensure the user is authenticated

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $parking_slots = ParkingSlot::whereDoesntHave('visitor')->where('status', 'Unoccupied')->get();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
        $types = ParkingStatus::all();
        $IdTypes = IdType::all();
        $companies = Company::all();
        $visitorCompanies = Company::all();
        $hostCompanyId = old('host_company_id', $user->company_id); // Default from logged-in user
        $hosts = User::where('company_id', $user->company_id)->where('role', 'host')->get();
        $departments = Department::where('company_id', $user->company_id)->get();
        $hostDesignations = Designation::where('company_id', $user->company_id)->get();


        $hostPhone = old('phone_ext', ''); // Default to empty
        if ($hosts->count() == 1) {
            $hostPhone = $hosts->first()->phone; // Automatically set if only one host is available
        }

        return view('visitors.create', compact(
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
            'parking_slots'
        ));
    }



    public function store(Request $request)
    {
        // Validate request data before processing
        $validated = $request->validate([
            'host_id' => 'required|exists:users,id',
            'company_id' => 'nullable|exists:companies,id',


            // -------------------------- visitor feild --------------------------------
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'department_name' => 'nullable|string|max:255',
            'designation_name' => 'nullable|string|max:255',
            'reason' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'phone' => 'nullable|numeric',
            'id_type' => 'nullable|in:CNIC,Passport,Other',
            'id_number' => 'nullable|string|max:255',
            'id_card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visitor_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // -------------------------- host feild --------------------------------

            'host_company_id' => 'nullable|exists:companies,id',
            'host_department_id' => 'nullable|exists:departments,id',
            'host_designation_id' => 'nullable|exists:designations,id',
            'phone_ext' => 'nullable|numeric',

            // -------------------------- visit feild --------------------------------

            'date_of_visit' => 'nullable|date',
            'date_of_exit' => 'nullable|date|after_or_equal:date_of_visit',
            'time_of_arrival' => 'nullable|date_format:H:i',
            'time_of_departure' => 'nullable|date_format:H:i',
            'item_carried' => 'nullable|string|max:255',
            'entry_pass_issued' => 'nullable|in:Yes,No',
            'is_escorted' => 'nullable|in:Yes,No',
            'badge_number' => 'nullable|string|max:255',
            'escorted_name' => 'nullable|string|max:255',

            // -------------------------- parking feild --------------------------------

            'vehicle_plate_no' => 'nullable|string|max:255',
            'parking_slot_id' => 'nullable|exists:parking_slots,id',
            'is_parking' => 'required|in:Yes,No',
        ]);

        // Fetch host details
        $host = User::find($request->host_id);

        if (!$host) {
            return back()->withErrors(['host_id' => 'Invalid host selected.']);
        }

        // Assign visitor details dynamically
        $visitor = new Visitor();
        $visitor->company_id = $request->company_id ?? $request->visitor_company_id;
        $visitor->host_id = $host->id;
        $visitor->visitor_id = $request->visitor_id;

        $visitor->name = $request->name;
        $visitor->company_name = $request->company_name;
        $visitor->department_name = $request->department_name;
        $visitor->designation_name = $request->designation_name;

        $visitor->reason = $request->reason;
        $visitor->gender = $request->gender;
        $visitor->phone = $request->phone;
        $visitor->id_type = $request->id_type;
        $visitor->id_number = $request->id_number;

        $visitor->host_company_id = $request->host_company_id;
        $visitor->host_department_id = $request->host_department_id;
        $visitor->host_designation_id = $request->host_designation_id;
        $visitor->phone_ext = $request->phone_ext;

        $visitor->date_of_visit = $request->date_of_visit ?? date('Y-m-d');
        $visitor->date_of_exit = $request->date_of_exit;
        $visitor->time_of_arrival = $request->time_of_arrival ?? date('H:i');
        $visitor->time_of_departure = $request->time_of_departure;

        $visitor->entry_pass_issued = $request->entry_pass_issued ?? 'No';
        $visitor->item_carried = $request->item_carried;
        $visitor->is_escorted = $request->is_escorted ?? 'No';
        $visitor->badge_number = $request->badge_number;
        $visitor->escorted_name = $request->escorted_name;

        $visitor->vehicle_plate_no = $request->vehicle_plate_no;
        $visitor->parking_slot_id = $request->parking_slot_id;
        $visitor->is_parking = $request->is_parking ?? 'No';


        // If parking is assigned, mark slot as 'Occupied'
        if ($request->parking_slot_id) {
            ParkingSlot::where('id', $request->parking_slot_id)->update(['status' => 'Occupied']);
        }

        // // Set receptionist ID
        if (auth()->check()) {
            $visitor->receiptionist_id = auth()->user()->id;
        }

        // Handle file uploads
        if ($request->hasFile('id_card_image')) {
            $visitor->id_card_image = $request->file('id_card_image')->store('visitor_id_cards', 'public');
        }

        if ($request->hasFile('visitor_photo')) {
            $visitor->visitor_photo = $request->file('visitor_photo')->store('visitor_photos', 'public');
        }

        $visitor->save();




        // Generate QR
        $qrText = "Visitor ID: {$visitor->id} | Show this QR on your visit";
        $qrPath = "qrcodes/visitor_{$visitor->id}.png";
        Storage::disk('public')->put($qrPath, QrCode::format('png')->size(200)->generate($qrText));
        $visitor->update(['qr_code' => $qrPath]);

        // Find the host (using host_id saved from form)
        $host = Host::find($visitor->host_id);

        // Send email to host
        Mail::raw("
            New visitor: {$visitor->name}
            Approve: " . route('visitor.approve', $visitor->id) . "
            Cancel: " . route('visitor.cancel', $visitor->id) . "
        ", function($msg) use ($host) {
            $msg->to($host->email)->subject('New Visitor Request');
        });

        // Send QR code email to visitor
        Mail::raw("Thanks for pre-registering. Please show this QR on your visit.", function($msg) use ($visitor) {
            $msg->to($visitor->email)->subject('Your Visitor QR Code');
        });

        return redirect()->back()->with('success', 'Visit record has been created successfully.');
    }


    // Host approves
    public function approveVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->update(['status' => 'approved']);

        Mail::raw("Your visit is approved. Please bring your QR code.", function($msg) use ($visitor) {
            $msg->to($visitor->email)->subject('Visit Approved');
        });

        return "Visitor Approved!";
    }

    // Host cancels
    public function cancelVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->update(['status' => 'canceled']);

        Mail::raw("Sorry, your visit has been canceled.", function($msg) use ($visitor) {
            $msg->to($visitor->email)->subject('Visit Canceled');
        });

        return "Visitor Canceled!";
    }



    /**
     * Display the specified visitor.
     */
    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor.parkingSlot'));
    }

    /**
     * Show the form for editing the specified visitor.
     */
    public function edit(Visitor $visitor)
    {

        $user = auth()->user(); // Ensure the user is authenticated

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $parking_slots = ParkingSlot::whereDoesntHave('visitor')->where('status', 'Unoccupied')->get();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
        $types = ParkingStatus::all();
        $IdTypes = IdType::all();
        $companies = Company::all();
        $visitorCompanies = Company::all();
        $hostCompanyId = old('host_company_id', $user->company_id); // Default from logged-in user
        $hosts = User::where('company_id', $user->company_id)->where('role', 'host')->get();
        $departments = Department::where('company_id', $user->company_id)->get();
        $hostDesignations = Designation::where('company_id', $user->company_id)->get();

        $hostPhone = old('phone_ext', ''); // Default to empty
        if ($hosts->count() == 1) {
            $hostPhone = $hosts->first()->phone; // Automatically set if only one host is available
        }

        return view('visitors.edit', compact(
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
            'parking_slots',
            'visitor'

        ));
    }

    /**
     * Update the specified visitor.
     */
    public function update(Request $request, $id)
    {
        // Validation rules
        $validated = $request->validate([
            // 'host_id' => 'required|exists:users,id',
            // 'company_id' => 'required|exists:companies,id',


            // -------------------------- visitor feild --------------------------------
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'department_name' => 'nullable|string|max:255',
            'designation_name' => 'nullable|string|max:255',
            'reason' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'phone' => 'nullable|numeric',
            'id_type' => 'nullable|in:CNIC,Passport,Other',
            'id_number' => 'nullable|string|max:255',
            'id_card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visitor_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // -------------------------- host feild --------------------------------

            'host_company_id' => 'nullable|exists:companies,id',
            'host_department_id' => 'nullable|exists:departments,id',
            'host_designation_id' => 'nullable|exists:designations,id',
            'phone_ext' => 'nullable|numeric',

            // -------------------------- visit feild --------------------------------

            'date_of_visit' => 'nullable|date',
            'date_of_exit' => 'nullable|date|after_or_equal:date_of_visit',
            'time_of_arrival' => 'nullable|date_format:H:i',
            'time_of_departure' => 'nullable|date_format:H:i',
            'entry_pass_issued' => 'nullable|in:Yes,No',
            'item_carried' => 'nullable|string|max:255',
            'is_escorted' => 'nullable|in:Yes,No',
            'badge_number' => 'nullable|string|max:255',
            'escorted_name' => 'nullable|string|max:255',

            // -------------------------- parking feild --------------------------------

            'vehicle_plate_no' => 'nullable|string|max:255',
            'parking_slot_id' => 'nullable|exists:parking_slots,id',
            'is_parking' => 'required|in:Yes,No',
        ]);

        $visitor = Visitor::findOrFail($id);

        $visitor->name = $request->name;
        $visitor->company_name = $request->company_name;
        $visitor->department_name = $request->department_name;
        $visitor->designation_name = $request->designation_name;
        $visitor->reason = $request->reason;
        $visitor->gender = $request->gender;
        $visitor->phone = $request->phone;
        $visitor->id_type = $request->id_type;
        $visitor->id_number = $request->id_number;

        $visitor->host_company_id = $request->host_company_id;
        $visitor->host_department_id = $request->host_department_id;
        $visitor->host_designation_id = $request->host_designation_id;
        $visitor->phone_ext = $request->phone_ext;

        $visitor->date_of_visit = $request->date_of_visit ?? date('Y-m-d');
        $visitor->time_of_arrival = $request->time_of_arrival ?? date('H:i');

        $visitor->entry_pass_issued = $request->entry_pass_issued ?? 'No';
        $visitor->item_carried = $request->item_carried;
        $visitor->is_escorted = $request->is_escorted ?? 'No';
        $visitor->badge_number = $request->badge_number;
        $visitor->escorted_name = $request->escorted_name;

        $visitor->vehicle_plate_no = $request->vehicle_plate_no;
        $visitor->is_parking = $request->is_parking ?? 'No';

        $visitor->receiptionist_id = auth()->user()->id ?? null;



        if ($visitor->approved_at == null) {
            if ($request->approved == 'Yes') {
                $visitor->status = 'Approved';
                $visitor->approved_at = now('Asia/Karachi');
                $visitor->approved_by = Auth::id();
            } else {
                $visitor->status = 'Pending';
                $visitor->approved_at = null;
                $visitor->approved_by = null;
            }
        }

        $visitor->date_of_exit = $request->date_of_exit;
        $visitor->time_of_departure = $request->time_of_departure;

        // Handle parking slot release on exit
        if ($request->date_of_exit && $request->time_of_departure) {
            if ($visitor->parking_slot_id) {
                ParkingSlot::where('id', $visitor->parking_slot_id)->update(['status' => 'Unoccupied']);
                $visitor->parking_slot_id = null;
            }
        }

        // Handle assigning new parking slot
        if ($request->parking_slot_id) {
            // If visitor had an old slot and it's different, mark old one Unoccupied
            if ($visitor->parking_slot_id && $visitor->parking_slot_id != $request->parking_slot_id) {
                ParkingSlot::where('id', $visitor->parking_slot_id)->update(['status' => 'Unoccupied']);
            }

            $visitor->parking_slot_id = $request->parking_slot_id;

            ParkingSlot::where('id', $request->parking_slot_id)->update(['status' => 'Occupied']);

            // Reset exit values when assigning a new parking slot
            $visitor->date_of_exit = null;
            $visitor->time_of_departure = null;
        }



        if ($request->hasFile('id_card_image')) {
            $visitor->id_card_image = $request->file('id_card_image')->store('visitor_id_cards', 'public');
        }

        if ($request->hasFile('visitor_photo')) {
            $visitor->visitor_photo = $request->file('visitor_photo')->store('visitor_photos', 'public');
        }
        $visitor->save();

        return redirect()->route('visitors.index')->with('success', 'Visitor record updated successfully.');
    }

    /**
     * Remove the specified visitor.
     */
    public function destroy(Visitor $visitor)
    {
        // If the visitor had a parking slot assigned, mark it as 'Unoccupied'
        if ($visitor->parking_slot_id) {
            ParkingSlot::where('id', $visitor->parking_slot_id)->update(['status' => 'Unoccupied']);
        }

        // Delete the visitor record
        $visitor->delete();

        return redirect()->route('visitors.index')->with('success', 'Visitor record deleted.');
    }


    /**
     * Approve a visitor entry.
     */
    public function approve($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->status = 'Approved';
        $visitor->host_approval = true;
        $visitor->approved_at = now('Asia/Karachi');
        $visitor->approved_by = Auth::id();
        $visitor->save();

        return redirect()->route('visitors.index')->with('success', 'Visitor approved successfully.');
    }

    /**
     * Mark visitor as exited.
     */
    public function exitVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->time_of_departure = now('Asia/Karachi');
        $visitor->status = 'Exited';

        // Calculate total duration (if entered_at exists)
        if ($visitor->time_of_arrival) {
            $visitor->duration = now('Asia/Karachi')->diffInMinutes($visitor->entered_at);
        }

        $visitor->save();

        return redirect()->route('visitors.index')->with('success', 'Visitor marked as exited.');
    }
    public function updateExitedAt($visitorId)
    {
        $visitor = Visitor::findOrFail($visitorId);

        // If exited_at is null, set it to the current date and time
        if (!$visitor->time_of_departure) {
            $visitor->date_of_exit = now('Asia/Karachi');
            $visitor->time_of_departure = now('Asia/Karachi');

            if ($visitor->parking_slot_id) {
                ParkingSlot::where('id', $visitor->parking_slot_id)->update(['status' => 'Unoccupied']);
                $visitor->parking_slot_id = null;
            }
            $visitor->save();
        }

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Exit time has been set.');
    }
    public function logs()
    {
        if (auth()->user()->role === 'Super Admin') {
            $logs = VisitorLogs::latest()->get();
        } elseif (auth()->user()->role === 'admin' || auth()->user()->role === 'host') {
            $logs = VisitorLogs::whereHas('visitor', function ($query) {
                $query->where('company_id', auth()->user()->company_id);
            })->get();
        } elseif (auth()->user()->role === 'receptionist') {
            $logs = VisitorLogs::where('user_id', auth()->user()->id)->latest()->get();
        }
        return view('visitors.logs', compact('logs'));
    }
    public function updateStatus(Request $request)
    {

        if (!$request->visitor_id) {
            return response()->json(['success' => false, 'message' => 'Visitor ID is missing'], 400);
        }

        $visitor = Visitor::find($request->visitor_id);
        $visitor->status = $request->status;
        $visitor->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }


    public function getDepartment($companyId)
    {
        // Fetch designations for the selected department
        $departments = Department::where('company_id', $companyId)->get();

        // Return depar$departments as a JSON response
        return response()->json(['departments' => $departments]);
    }
}
