<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Authentication;
use App\Http\Middleware\Role;

class Kernel
{
    public array $routeMiddleware = [
        "auth" => Authentication::class,
        "role" =>  Role::class,
    ];
}