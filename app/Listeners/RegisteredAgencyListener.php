<?php

namespace App\Listeners;

use App\Mail\SendMailValidation;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisteredAgencyListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $agency = $event->agency;
        $superAdmin = User::superAdmin($agency->id)->first();

        Mail::to($superAdmin->email)->send(new SendMailValidation($superAdmin, $agency));
    }
}
