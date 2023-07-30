<?php

namespace App\Http\Request;

class Request
{
    protected array $request = [];

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
    }

    public function get(string $key)
    {
        return $this->request[$key];
    }

    public function all()
    {
        return $this->request;
    }

    public function session($key = null)
    {
        return $_SESSION;
    }

    public function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}