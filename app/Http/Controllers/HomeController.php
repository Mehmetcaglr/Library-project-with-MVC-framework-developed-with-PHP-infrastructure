<?php

namespace App\Http\Controllers;

class HomeController
{

    public function index()
    {
        view("layout/master");
    }

    public  function list()
    {

        view("product/list");
    }

    public function create()
    {
        view("product/form ");
    }

}