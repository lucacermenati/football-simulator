<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;

class CompetitionPolicy
{
    public function view (User $user, Competition $competition)
    {
        return $this->owns($user, $competition);
    }

    public function update (User $user, Competition $competition)
    {
        return $this->owns($user, $competition);
    }

    public function delete (User $user, Competition $competition)
    {
        return $this->owns($user, $competition);
    }

    private function owns(User $user, Competition $competition)
    {
        return $user->id === $competition->user_id;
    }
}