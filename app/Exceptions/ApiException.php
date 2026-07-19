<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $message = "Something went wrong";

    protected $httpStatus = 500;

    public function toResponse($request)
    {
        return response()->json([
            'message' => $this->message,
        ], $this->httpStatus);
    }
}
