<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Visitor;
use App\Models\VisitorLogs;
use App\Notifications\NewVisitorNotification;
use App\Notifications\VisitorStatusChangedNotification;

class VisitorObserver
{
    /**
     * Handle the Visitor "created" event.
     */
    public function creating(Visitor $visitor): void
    {
        // Generate a unique visitor ID
        $latestVisitor = Visitor::latest()->first();
        $nextId = $latestVisitor ? ((int) str_replace('VISITOR-', '', $latestVisitor->visitor_id)) + 1 : 1;

        $visitor->visitor_id = 'VISITOR-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
    }
    public function created(Visitor $visitor): void
    {

        $this->storeLog($visitor, "Visitor {$visitor->name} created.");
        $this->storeLog($visitor, "Visitor entered at {$visitor->entered_at}.", 'entry');
        $this->storeLog($visitor, "Visitor status is {$visitor->status_id}.");
        // Log other fields if necessary
        if ($visitor->host_approval) {
            $this->storeLog($visitor, "Host approval is {$visitor->host_approval}.");
        }
        if ($visitor->entry_pass_issued) {
            $this->storeLog($visitor, "Entry pass issued: {$visitor->entry_pass_issued}.");
        }
        // $companyAdmin = User::findOrFail($visitor->company->admin->id);
        $companyAdmin = $visitor->company && $visitor->company->admin
            ? User::find($visitor->company->admin->id)
            : null;
        if ($companyAdmin) {
            $companyAdmin->notify(new NewVisitorNotification($visitor));
        }
        $Host = User::find($visitor->host_id);
        if ($Host) {
            $Host->notify(new NewVisitorNotification($visitor));
        }
        $receptionists = User::where('role', 'receptionist')->get();

        foreach ($receptionists as $receptionist) {
            $receptionist->notify(new NewVisitorNotification($visitor));
        }

    }

    /**
     * Handle the Visitor "updated" event.
     */
    public function updated(Visitor $visitor): void
    {
        // Track changes for important fields
        if ($visitor->isDirty('name')) {
            $this->storeLog($visitor, "Name changed to {$visitor->name}.");
        }

        if ($visitor->isDirty('company_id')) {
            $this->storeLog($visitor, "Company changed to {$visitor->company_id}.");
        }

        if ($visitor->isDirty('gender')) {
            $this->storeLog($visitor, "Gender changed to {$visitor->gender}.");
        }

        if ($visitor->isDirty('phone')) {
            $this->storeLog($visitor, "Phone number changed to {$visitor->phone}.");
        }

        if ($visitor->isDirty('vehicle_plate_number')) {
            $this->storeLog($visitor, "Vehicle plate number changed to {$visitor->vehicle_plate_number}.");
        }

        if ($visitor->isDirty('items_carried')) {
            $this->storeLog($visitor, "Items carried changed to {$visitor->items_carried}.");
        }

        if ($visitor->isDirty('reason')) {
            $this->storeLog($visitor, "Reason changed to {$visitor->reason}.");
        }

        if ($visitor->isDirty('host_name')) {
            $this->storeLog($visitor, "Host name changed to {$visitor->host_name}.");
        }

        if ($visitor->isDirty('entered_at')) {
            $this->storeLog($visitor, "Entry time changed to {$visitor->entered_at}.", 'entry');
        }

        if ($visitor->isDirty('exited_at')) {
            // Check if exited_at is null
            if ($visitor->exited_at === null) {
                $this->storeLog($visitor, "Visitor exited at {$visitor->exited_at}.", 'entry');
            } else {
                $this->storeLog($visitor, "Exit time changed to {$visitor->exited_at}.", 'entry');
            }
        }

        if ($visitor->isDirty('status')) {
            // Notify relevant users
            $companyAdmin = User::find($visitor->company->admin->id ?? '');
            $host = User::find($visitor->host_id ?? '');
            $receptionist = User::find($visitor->receiptionist_id ?? '');
            $loggedInUser = auth()->user();

            if ($companyAdmin) {
                $companyAdmin->notify(new VisitorStatusChangedNotification($visitor));
            }

            if ($host) {
                $host->notify(new VisitorStatusChangedNotification($visitor));
            }

            if ($receptionist) {
                $receptionist->notify(new VisitorStatusChangedNotification($visitor));
            }

            // If the logged-in user is NOT the company admin, host, or receptionist, notify them too
            if (
                !in_array($loggedInUser->id, [
                    $companyAdmin?->id,
                    $host?->id,
                    $receptionist?->id
                ])
            ) {
                $loggedInUser->notify(new VisitorStatusChangedNotification($visitor));
            }
            $this->storeLog($visitor, "Status changed to {$visitor->status_id}.");
        }

        if ($visitor->isDirty('host_approval')) {
            $this->storeLog($visitor, "Host approval changed to {$visitor->host_approval}.");
        }

        if ($visitor->isDirty('entry_pass_issued')) {
            $this->storeLog($visitor, "Entry pass issued changed to {$visitor->entry_pass_issued}.");
        }

        if ($visitor->isDirty('access_card_number')) {
            $this->storeLog($visitor, "Access card number changed to {$visitor->access_card_number}.");
        }

        if ($visitor->isDirty('is_escorted')) {
            $this->storeLog($visitor, "Escorted status changed to {$visitor->is_escorted}.");
        }

        if ($visitor->isDirty('id_type')) {
            $this->storeLog($visitor, "ID type changed to {$visitor->id_type}.");
        }

        if ($visitor->isDirty('id_number')) {
            $this->storeLog($visitor, "ID number changed to {$visitor->id_number}.");
        }

        if ($visitor->isDirty('id_card_image')) {
            $this->storeLog($visitor, "ID card image updated.");
        }

        if ($visitor->isDirty('visitor_photo')) {
            $this->storeLog($visitor, "Visitor photo updated.");
        }
    }

    /**
     * Handle the Visitor "deleted" event.
     */
    public function deleted(Visitor $visitor): void
    {
        $this->storeLog($visitor, "Visitor deleted.");
    }

    /**
     * Handle the Visitor "restored" event.
     */
    public function restored(Visitor $visitor): void
    {
        $this->storeLog($visitor, "Visitor restored.");
    }

    /**
     * Store logs in the VisitorLogs table.
     */
    private function storeLog(Visitor $visitor, $details, $change = null)
    {
        $log = new VisitorLogs();
        $log->user_id = auth()->user()->id;
        $log->visitor_id = $visitor->id;
        $log->message = $details;
        $log->type = $change ?? 'change';
        $log->save();
    }
}
