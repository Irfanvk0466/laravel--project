<?php

namespace App\Listeners;

use App\Events\NewUserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;

class SendWelcomeMailListener
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
        //Mail::to($event->user->email)->cc('anju@gmail.com')->bcc('khaali@gmail.com')->send(new UserCreatedMail($event->user));
        //
    }
}
