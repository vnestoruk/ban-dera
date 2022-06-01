<?php

namespace App\Observers;

use App\Events\SignUpEvent;
use App\Models\User;
use Illuminate\Support\Facades\Event;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        SignUpEvent::dispatch($user->nickname);
    }

}
