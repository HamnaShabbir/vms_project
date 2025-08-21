<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class NotificationController extends Controller
{
    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor'));
    }
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        return response()->json(['success' => true]);
    }
    public function fetchNotifications()
    {
        $notifications = auth()->user()->unreadNotifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'message' => $notification->data['message'],
                'url' => route('visitors.show', $notification->data['visitor_id'])
            ];
        });

        return response()->json([
            'success' => true,
            'notifications' => $notifications
        ]);
    }
}
