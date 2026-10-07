<?php

namespace App\Http\Controllers\Api;

use App\Enums\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\NationalityResource;

class NationalityController extends Controller
{
    public function index()
    {
        return NationalityResource::collection(Country::cases())->response();
    }
}
