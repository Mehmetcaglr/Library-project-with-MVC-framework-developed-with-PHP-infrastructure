<?php

namespace App\Http\Controllers;

use App\Model\User\User;
use App\Http\Request\Request;
use App\Http\Request\ValidateRequest;


class RegisterController extends BaseController
{
    use ValidateRequest;

    public function index()
    {
        view("register/register");
    }


    public function save()
    {

    }

    public function create(Request $request)
    {
        $this->validate($request,[
            "name" => ["string","required"],
            "email" => ["required","string","email","exits:users"],
            "phone" => ["required","number"],
            "password" => ["required","string","min:6","max:10","password"],
            "confirmed_password" => ["required","string","min:6","confirm_password"]
            ]);



        $user =  new User();
        $user->create([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "phone" => $request->get("phone"),
            "password" => $request->get("password"),
        ]);

        return view("register/successful");
    }

}