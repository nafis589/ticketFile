<?php

namespace App\Policies;

use App\Models\Counter;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CounterPolicy
{
    /**
     * Determine whether the user can act upon the counter queue (appeler, traiter, etc.).
     */
    public function manage(User $user, Counter $counter): bool
    {
        return $user->id === $counter->agent_user_id;
    }

    /**
     * Alternative policy method specifically for 'call' 
     */
    public function call(User $user, Counter $counter): bool
    {
        return $user->id === $counter->agent_user_id;
    }

    /**
     * Alternative policy method specifically for 'treat'
     */
    public function treat(User $user, Counter $counter): bool
    {
        return $user->id === $counter->agent_user_id;
    }

    /**
     * Alternative policy method specifically for 'absent'
     */
    public function absent(User $user, Counter $counter): bool
    {
        return $user->id === $counter->agent_user_id;
    }
}
