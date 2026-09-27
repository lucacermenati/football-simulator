<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    public function owns (User $user, Team $team)
    {
        return $user->id === $team->user_id;
    }
}
