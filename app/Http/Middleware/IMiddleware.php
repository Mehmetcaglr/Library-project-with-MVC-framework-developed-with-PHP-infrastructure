<?php

namespace App\Http\Middleware;

use App\Http\Request\Request;
use Closure;

interface IMiddleware
{
    public function handle(Closure $next, Request $request);
}