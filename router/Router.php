<?php

namespace Router;

use App\Http\Controllers\ProductController;
use App\Http\Middleware\Middleware;
use Closure;
use App\Http\Request\Request;
use App\Http\Middleware\Kernel;

class Router
{
//    private static array $routes =  [];
//
//    public static function get(string $url, \Closure|string $action)
//    {
//        self::$routes['get'][$url] = ["action" => $action];
//    }

    protected static string $url;

    protected static $middlewareName = null;

    protected static array $pattern = [
        "{url}" => "([0-9A-Za-z-]+)",
        "{id}" => "([0-9]+)"
    ];

    public static function get( string $path, Closure|string|array $callback, $parameters = null)
    {
        self::run($path, $callback, "GET");
    }


    public static function post( string $path, Closure|string|array $callback, $parameters = null)
    {
        self::run($path, $callback, "POST");
    }

    /**
     * @return array|string|string[]
     */
    public static function parseUrl()
    {
        $dirName = dirname($_SERVER["SCRIPT_NAME"]); // değer = /
        $dirName = $dirName != "/" ? $dirName : null; // değer= \
        $baseName = basename($_SERVER["SCRIPT_NAME"]); // değer = index.php
        $requestUri = str_replace([$dirName,$baseName], null, $_SERVER["REQUEST_URI"]); // değer =  /test?name=mehmet&id=35

        if(strrpos($requestUri, "?"))
        {
            $sttrPosCount = strrpos($requestUri, "?");
            $requestUri = substr($requestUri, 0, $sttrPosCount);
        }

        if($requestUri === "/" )
        {
            return rtrim($requestUri, "/");
        }
        return rtrim($requestUri, "/");
    }

    public static function run(string $url, string|array|Closure $call, string $method)
    {
        $keys = array_keys(self::$pattern);// ["{url}", "{id}"]
        $values = array_values(self::$pattern);// ["([0-9a-zA-Z-]+)"," ([0-9]+)"]
        $url = str_replace($keys, $values, $url); // /product/edit/([0-9]+)  /product/edit/([0-9A-Za-z-]+)
        $parseUrl = self::parseUrl();// /product/edit/5


        if(preg_match('@^'.$url.'$@', $parseUrl, $parameters))
        {
            self::checkMethod($method);
           // self::checkControlMiddleware(self::$middlewareName);
            unset($parameters[0]);
            $parms = $parameters[1] ?? null;
            $request = new Request();

            if(is_callable($call))
            {
                call_user_func_array($call, [$request, $parms]);
            }

            if(is_array($call))
            {
                $filePath = strtr(lcfirst($call[0]), "\\", "/");
                $controllerPath = __DIR__."/../$filePath".".php";
                if(file_exists($controllerPath))
                {
                    call_user_func_array([new $call[0], $call[1]], [$request, $parms]);
                }
            }

            if(is_string($call))
            {
                $call = explode("@", $call);
                $filePath = strtr(lcfirst($call[0]), "\\", "/");
                $controllerPath = __DIR__. "/../$filePath".".php";
                if(file_exists($controllerPath))
                {
                    call_user_func_array([new $call[0], $call[1]], [$request, $parms]);
                }
            }
        }
    }

    public static function checkControlMiddleware(string $key = null)
    {
        $request = new Request();
        $kernel = new Kernel();
        Middleware::call($kernel->routeMiddleware[$key], function ($request){}, $request);  //key'im auth
    }

    public static function middleware(string $middleware)
    {
        //self::$middlewareName = $middleware;
        self::checkControlMiddleware($middleware);
        return new self();
    }

    public static function checkMethod(string $type)
    {
        if (self::typeMethod() === $type){
            return true;
        } else {
            echo self::messsage("method tipi uyuşmamaktadır");
            die;
        }
    }

    public static function typeMethod()
    {
        $methodType = $_SERVER["REQUEST_METHOD"];

        return $methodType;
    }

    public static function  messsage($message)
    {
        return $message;
    }
}
