<?php

namespace App\Listeners;

use App\Mail\SendLinkToMailMai;
use App\Events\SendMail;
use App\Mail\SendLinkToMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailForUserActivation
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
    public function handle(SendMail $event): void
    {
        $token = hash('sha256', time());
        $user = $event->user;
        $user->token = $token;
        $user->save();

        $link = URL::temporarySignedRoute(
            'validation', now()->addHours(24), ['email' => $user->email, 'token' => $token]
        );

        $data = [
            'username' => $user->username,
            'link' => $link,
        ];

        Mail::to($user->email)->send(new SendLinkToMail($data));
    }
}
