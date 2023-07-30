<?php

namespace App\Http\Middleware;

use App\Http\Request\Request;
use Buki\Router\Http\Http;
use Closure;

//      class                            next                $request
//new $kernel->routeMiddleware[$key], function ($request){}, $request
// "auth" => Authentication::class,
//        "role" =>  Role::class,

class Middleware
{
    public static function call($class, Closure $next, Request $request)
    {
        return call_user_func_array([new $class, "handle"], [$next, $request]);
    }
}