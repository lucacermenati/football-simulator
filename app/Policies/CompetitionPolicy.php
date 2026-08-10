<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;

class CompetitionPolicy
{
    public function owns (User $user, Competition $competition)
    {
        return $user->id === $competition->user_id;
    }
}