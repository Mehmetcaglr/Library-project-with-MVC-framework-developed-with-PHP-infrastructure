<?php

namespace App\Model\User;

use App\Model\Model;

class User extends Model
{
    protected $table = "users";

    protected $fillable = ['user_id', 'name', 'surname', 'email','password'];


}