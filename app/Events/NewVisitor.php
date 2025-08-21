<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewVisitor implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

     public $visitor;

    /**
     * Create a new event instance.
     */
    public function __construct($visitor)
    {
        $this->visitor = $visitor;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function broadcastOn()
    {
        return new Channel('visitors');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function broadcastAs()
    {
        return 'create';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'message' => "[{$this->visitor->created_at}] New visitor added with name '{$this->visitor->name}'."
        ];
    }
}
