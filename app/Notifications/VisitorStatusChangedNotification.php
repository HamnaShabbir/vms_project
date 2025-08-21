<?php

namespace App\Notifications;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VisitorStatusChangedNotification  extends Notification
{
    use Queueable;

    protected $visitor;

    public function __construct($visitor)
    {
        $this->visitor = $visitor;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast','mail']; // Stores in DB & broadcasts via WebSockets
    }


    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Visitor Status Updated')
            ->greeting('Hello!')
            ->line("The status of visitor {$this->visitor->name} has changed to {$this->visitor->status}.")
            ->action('View Visitor', url('/visitor/' . $this->visitor->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'visitor_id' => $this->visitor->id,
            'message' => "Visitor {$this->visitor->name}'s status has changed to {$this->visitor->status}.",
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => "Visitor {$this->visitor->name}'s status has changed to {$this->visitor->status}.",
            'visitor_id' => $this->visitor->id
        ]);
    }
    public function toDatabase($notifiable)
    {
        return [
            'message' => "Visitor {$this->visitor->name}'s status has changed to {$this->visitor->status}.",
            'visitor_id' => $this->visitor->id,
            'url' => route('visitors.show', $this->visitor->id),
        ];
    }
}
