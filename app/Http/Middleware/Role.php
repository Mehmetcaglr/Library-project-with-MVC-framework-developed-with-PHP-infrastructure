<?php

namespace App\Http\Middleware;

use App\Http\Request\Request;
use Closure;

class Role implements IMiddleware
{
    public function handle(Closure $next, Request $request)
    {
        if(isset($_SESSION["admin"]) && $_SESSION["password"] == "mehmet")
        {
            $next($request);
        }else{
           header("location:".$_SERVER["HTTP_REFERER"], "Kullanıcı yetkisi bulunmamaktadır", );
           exit();
        }
    }
}