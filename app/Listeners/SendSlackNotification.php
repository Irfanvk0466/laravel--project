<?php

namespace App\Listeners;

use App\Events\NewUserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSlackNotification
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
     * @param  \App\Events\NewUserCreatedEvent  $event
     * @return void
     */
    public function handle(NewUserCreatedEvent $event)
    {
        //
    }
}
