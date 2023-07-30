<?php
namespace App\Http\Controllers;

use App\Http\Request\Request;
use App\Model\Model;
use App\Model\Category\Category;
use App\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $category = new Category();
        $data = $category->join()->query()->get();

        echo "<pre>";
        print_r($data);
        return json_encode($data);
    }

    public function edit()
    {

    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}