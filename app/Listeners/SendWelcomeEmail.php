<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomEmail;
use App\Models\User;

class SendWelcomeEmail implements ShouldQueue
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
    public int $tries = 3;
    public function handle(UserRegistered $event): void
    {
        // throw new Exception('Erreur lors de l\'envoi de l\'email');
        Mail::to($event->user->email)->send(new WelcomEmail($event->user));
    }
}
