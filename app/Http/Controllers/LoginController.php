<?php

namespace App\Http\Controllers;

use App\Http\Request\Request;
use App\Http\Request\ValidateRequest;
use App\Model\User\User;


class LoginController extends BaseController
{

    public function index()
    {
        view("login/login");
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            "email" => ["required", "string","email","exits:users"],
            "password" => ["required","string","min:6","password","max:10"]
        ]);
      $user = new User();
      //$password = base64_encode($request->get("password"));

//      if($request->get("password") != "")
//      {
//          $salt = uniqid('', true);
//          $hashPassword = password_hash($request->get("password").$salt, PASSWORD_DEFAULT);
//      }
//
//        $password = $hashPassword;

        $email = $request->get("email");
        $password = $request->get("password");

      // $user->query()->where(["email" => "huseyin.tekin@gmail.com", "password" =>"12345678"]);

      $users = $user->query()->where("email = '$email' and password = '$password'")->first();


      $user->checkSession($request,$users);

        if(count(error())>0) {
            die("test");
            $this->redirect();
        }else{
            return view("login/successful");
        }
    }

}