<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignUserRole
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

    public function handle(Registered $event): void
    {
        $user = $event->user;

        $role = Role::where('role_name', 'user')->first();

        if ($role) {
            $user->roles()->attach($role->id);
        }
    }
}
