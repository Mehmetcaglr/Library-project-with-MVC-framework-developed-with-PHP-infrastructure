<?php

namespace App\Http\Controllers;

use App\Http\Request\Request;
use App\Model\Model;
use App\Model\User\User;


class UserController extends BaseController
{
    public function index(Request $request)
    {
        $users = new User();

        $data = $users->query();

        echo "<pre>";

        print_r($data);die;
        return json_encode($data);
    }
}