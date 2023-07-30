<?php
declare(strict_types=1);
include __DIR__."/vendor/autoload.php" ;
//error_reporting(E_ALL);
ob_start();
session_start();
//include  __DIR__."/app/Http/Controllers/TestController.php";
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Router\Router;
use App\Http\Controllers\ProductController;
use App\Http\Request\Request;
use App\Http\Controllers\RegisterController;

/*$test = "ali";
$test = "ahmet";

echo $test."<br>";

function test(string $t1, array $t2 = ["name"=>"husyein", "surname" =>"tekin"] )
{
    echo $t1. "<br>";

    foreach ($t2 as $key => $datum)
    {
        echo $key . " : ". $datum."<br>";
    }
}

function test1(string $t1, array $t2 = ["name"=>"husyein", "surname" =>"tekin"] )
{
    echo $t1. "<br>";

    foreach ($t2 as $key => $datum)
    {
        echo $key . " : ". $datum."<br>";
    }
}

echo test("mehmet", ["name"=>"husyein", "surname" =>"tekin"]);
echo test1("mehmet", ["name"=>"husyein", "surname" =>"tekin"]);
die;*/
//Router::get("/index", function()
//{
//    echo "merhaba dunya";
//
//});
//$test = ["class" => "TestController::class", "method" => "index", "bool" => true, "arr" => ["name" => "mehmet", "age" => 20 ]];
//
//print_r($test["arr"]["name"]);
/*//
//echo gettype($test["arr"]);

//$test = ["name" => "mehmet"];
//echo "<pre>";
//$test ["attribute"]["age"] = 19;
//print_r($test);
//die;

//Router::get("/test", [TestController::class, "index"]);

$name = "sds";
$tst =  "sdsd";

$callback = function ($p1, $p2, $p3) use ($name, $tst)
    {
        return $p1 + $p2 + $p3;
    };


function hello()
{
    return "hello world";
}


class test
{
    public function index(Request $request)
    {
        return view("product/list");
    }

    public function edit(Request $request, $id)
    {
        echo "beni dışarıdan gelen bir id değeiyim = ". $id;
    }
}

$requset = new Request();
echo call_user_func_array([new test(), "edit"], [$requset, 3]);
//echo calculater();
//echo call_user_func('calculater', 3);
//$test = new test();
//
//echo $test->index();
//echo cll_usr_fnc("hello");
die;*/


Router::get("/test", [ProductController::class, "index"]);
Router::get("/product/add", [ProductController::class, "add"]);
Router::get("/product/parse", [ProductController::class, "getArray"]);
Router::get("/product/edit/{id}", [ProductController::class, "edit"]);
Router::post("/product/save", [ProductController::class, "save"]);
Router::post("/product/update/{id}", [ProductController::class, "update"]);
//Router::get("/product/destroy/{id}", [ProductController::class, "destroy"]);


Router::get("/home", [HomeController::class, "index"]);
Router::get("/list", [HomeController::class, "list"]);
Router::get("/create", [HomeController::class, "create"]);




Router::get("/register", [RegisterController::class, "index"]);
Router::post("/register/form", [RegisterController::class, "create"]);
Router::get("/login", [LoginController::class, "index"]);
Router::post("/login/control", [LoginController::class, "login"]);





Router::get("/category", [CategoryController::class, "index"]);
Router::get("/category/edit/{id}","App\Http\Controllers\CategoryController@index");

