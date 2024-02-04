<?php

namespace App\Listeners;

use App\Events\ActivateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusToActiveOnUser
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
    public function handle(ActivateUser $event): void
    {
        $user = $event->user;
        $user->is_active = true;
        $user->token = null;
        $user->save();
    }
}
