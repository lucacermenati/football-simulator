<?php

namespace App\Exceptions;

class InvalidTeamCountException extends ApiException
{
    protected $httpStatus = 400;

    public function __construct(int $teamCount)
    {
        parent::__construct("Cannot generate matches: a competition needs an even number of at least two teams (got {$teamCount}).");
    }
}
