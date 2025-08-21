<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewVisitorNotification  extends Notification
{
    use Queueable;

    protected $visitor;

    public function __construct($visitor)
    {
        $this->visitor = $visitor;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; // Stores in DB & broadcasts via WebSockets
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'New visitor registered: ' . $this->visitor->name,
            'visitor_id' => $this->visitor->id
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => 'New visitor registered: ' . $this->visitor->name,
            'visitor_id' => $this->visitor->id
        ]);
    }
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'New visitor created successfully!',
            'visitor_id' => $this->visitor->id,
            'url' => route('visitors.show', $this->visitor->id),
        ];
    }
}
