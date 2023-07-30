<?php

namespace App\Http\Controllers;

use App\Http\Request\Request;
use App\Http\Request\ValidateRequest;

class BaseController
{
    use ValidateRequest;

    protected function redirect(string $path = null)
    {

        $path = $path !== null ? $path : $_SERVER["HTTP_REFERER"];

        return header("location:".$path);
    }



}