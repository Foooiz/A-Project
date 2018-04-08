<?php

namespace App\Listeners;

use App\Events\NewNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewNotification  $event
     * @return void
     */
    public function handle(NewNotification $event)
    {
        //
    }
}
