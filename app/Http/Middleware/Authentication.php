<?php

namespace App\Http\Middleware;

use App\Http\Request\Request;
use Closure;
use App\Http\Middleware\IMiddleware;

class Authentication implements IMiddleware
{
// function ($request){}, $request
    public function handle(Closure $next, Request $request)
    {
        if (isset($_SESSION["email"]) && $_SESSION["email"] === "mehmet@gmail.com"){
            return $next($request);
        }else{
            view("login/login");
            die();
        }

    }

}