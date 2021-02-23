<?php

namespace App\Policies;

use App\Models\Alert;
use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlertPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, $event_id)
    {
        $event = Event::findOrFail($event_id);

        return $user->id === $event->planner_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Alert  $alert
     * @return mixed
     */
    public function update(User $user, Alert $alert)
    {
        return $user->id === $alert->event->planner_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Alert  $alert
     * @return mixed
     */
    public function delete(User $user, Alert $alert)
    {
        return $user->id === $alert->event->planner_id;
    }
}
