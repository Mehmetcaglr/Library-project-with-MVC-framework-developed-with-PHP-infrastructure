<?php

namespace App\Model\Category;

use App\Model\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [];

    protected $order = "name";

    protected $whereLike = "'t%'";

}