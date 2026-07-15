<?php

namespace App\Exceptions;

use App\Exceptions\ApiException;

class InvalidCredentialsException extends ApiException
{
    protected $message = 'Invalid credentials.';
    protected $httpStatus = 401;
}