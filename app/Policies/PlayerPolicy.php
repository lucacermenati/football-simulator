<?php

namespace App\Policies;

use App\Models\Player;
use App\Models\User;

class PlayerPolicy
{
    public function owns (User $user, Player $team)
    {
        return $user->id === $team->user_id;
    }
}
