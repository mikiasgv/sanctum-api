<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\Place;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlacePolicy
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
     * @param  \App\Models\Place  $place
     * @return mixed
     */
    public function update(User $user, Place  $place)
    {
        return $user->id === $place->event->planner_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return mixed
     */
    public function delete(User $user, Place  $place)
    {
        return $user->id === $place->event->planner_id;
    }


}
