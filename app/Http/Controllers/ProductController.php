<?php

namespace App\Http\Controllers;

use App\Http\Request\Request;
use App\Model\Category\Category;
use App\Model\Model;
use App\Model\Product\Product;
use App\Model\User\User;
use App\Http\Controllers\BaseController;
use Cassandra\Date;
use Router\Router;

class ProductController extends BaseController
{
    function __construct()
    {
        Router::middleware("auth");
    }

    public function index(Request $request)
    {
        $products = new Product();
        $data["products"] = $products->query()
            ->with("categories",
                'category_id',
                [
                    "categories.name as category_name",
                    "categories.category_id",
                    "products.name as product_name",
                    "products.price",
                    "products.product_id",
                    "products.category_id",
                    "products.brand_id",
                    "products.created_date"
                ]
            )->get();
            view("__product/form");
    }

    public function add()
    {
        $category = new Category();
        $data["category"] = $category->query()->get();

        $data["action"] = "product/save";
        view("product/form",$data);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
         "name" => ["string","required"],
         "email" => ["required", "string","email","exits:users"],
         "phone" => ["required", "number"],
         "password" => ["required", "string", "min:6","password","max:10"],
         "confirmed_password" => ["required", "string","min:6","confirmed_password","max:10"],
        ]);

        die;

        $products = new Product();
        $products->create([
            "name" => $request->get("name"),
            "category_id" => $request->get("category_id"),
            "brand_id" => $request->get("category_id"),
            "price" => $request->get("price")
        ]);
        return header("location:http://localhost:9000/product");
        //return header("location:".$_SERVER["HTTP_REFERER"]);
       // print_r($request->all()["name"]);  // girilen name değerini alıyor.
    }

    public function show()
    {


    }

    public function edit(Request $request, $id)
    {

        $product = new Product();

        $data["product"] = $product->find($id);

        $category = new Category();

        $data["category"] = $category->query()->get();

        $data["action"] = "product/update/".$data["product"]->product_id;

        view("product/form",$data);
    }

    public function create()
    {


    }

    public function store()
    {

    }


    public function update(Request $request, $id)
    {
        $product = new Product();


        $this->validate($request,[
            "name" => ["string", "required"] ,
            "category_id" => ["required", "integer"] ,
            "brand_id" => ["required", "integer"],
            "test" => ["required", "integer"],
            "test2" => ["required", "integer"],
        ]);

         $data = $product->update([
            "name" => $request->get("name"),
            "category_id" => $request->get("category_id"),
            "brand_id" => $request->get("brand_id"),
            "price" => $request->get("price")
        ], $id);


        return $this->redirect("/product");
    }

    public function destroy(Request $request, $id)
    {
        $product = new Product();

        $product->delete($id);

        return $this->redirect("/product");
    }


}