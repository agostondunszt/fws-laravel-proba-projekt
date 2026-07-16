<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Mail\ContactFormMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactFormSubmitted $event): void
    {
        $recipient = env('CONTACT_FORM_RECIPIENT', 'default@example.com');

        Mail::to($recipient)->send(new ContactFormMail($event->data));
    }
}
