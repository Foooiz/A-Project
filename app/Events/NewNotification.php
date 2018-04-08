<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notificationCount;

    public function __construct($notificationCount)
    {
        $this->notificationCount = $notificationCount;
    }

    public function broadcastAs()
    {
        return 'NotificationCount';
    }

    public function broadcastOn()
    {
        return new Channel('my-channel');
    }
}
