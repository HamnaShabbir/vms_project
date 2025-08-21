<?php

namespace App\Imports;

use App\Models\Host;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HostsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Log the entire row data for debugging
        \Log::info('Processing row:', $row);

        // Validate email presence
        if (empty($row['email'])) {
            \Log::error('Missing email in row:', $row);
            return null; // Skip this row
        }

        // Check if email exists
        if (User::where('email', $row['email'])->exists()) {
            throw new \Exception('Email already exists: ' . $row['email']);
        }


        // Create a new user
        $user = User::create([
            'email' => $row['email'],
            'name' => $row['name'],
            'phone' => $row['phone'] ?? null,
            'gender' => $row['gender'] ?? null,
            'password' => Hash::make($row['password'] ?? '12345678'), // Default password if not provided
            'company_id' => auth()->user()->company_id,
            'role' => 'host',
        ]);

        // Fetch the latest host to generate the next ID
        $latestHost = Host::latest()->first();
        $nextId = $latestHost ? ((int) str_replace('HOST-', '', $latestHost->host_id)) + 1 : 1;
        $newHostId = 'HOST-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

        // Create and return a new Host record
        return new Host([
            'host_id' => $newHostId,
            'user_id' => $user->id,
            'company_id' => auth()->user()->company_id,
            'department_id' => $row['department_id'] ?? null,
            'designation_id' => $row['designation_id'] ?? null,
            'status' => $row['status'] ?? null,
            'extension' => $row['extension'] ?? null,
        ]);
    }

    public function onError(\Throwable $e)
    {
        Session::flash('error', $e->getMessage());
    }








    // public function model(array $row)
    // {
    //     // Log the entire row data for debugging
    //     \Log::info('Processing row:', $row);

    //     // Log the email field specifically
    //     if (empty($row['email'])) {
    //         \Log::error('Missing email in row:', $row);
    //         return null; // Skip this row
    //     }

    //     // Check if the user already exists, otherwise create a new one
    //     $user = User::firstOrCreate(
    //         ['email' => $row['email']],
    //         [
    //             'name' => $row['name'],
    //             'phone' => $row['phone'] ?? null,
    //             'gender' => $row['gender'] ?? null,
    //             'password' => Hash::make($row['password'] ?? 'default123'), // Default password if not provided
    //             'company_id' => auth()->user()->company_id,
    //             'role' => 'host',
    //         ]
    //     );

    //     // Fetch the latest host to generate the next ID
    //     $latestHost = Host::latest()->first();
    //     $nextId = $latestHost ? ((int) str_replace('HOST-', '', $latestHost->host_id)) + 1 : 1;
    //     $newHostId = 'HOST-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

    //     // Create and return a new Host record
    //     return new Host([
    //         'host_id' => $newHostId,
    //         'user_id' => $user->id,
    //         'company_id' => auth()->user()->company_id,
    //         'department_id' => $row['department_id'] ?? null,
    //         'designation_id' => $row['designation_id'] ?? null,
    //         'status' => $row['status'] ?? null,
    //         'extension' => $row['extension'] ?? null,
    //     ]);
    // }


}
