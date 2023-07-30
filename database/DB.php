<?php
namespace Database;

use PDOException;
use PDO;

use App\Http\Request\ValidateRequest;

class DB
{
   use ValidateRequest;

   protected $pdo;

   protected string $sql;

   protected static $db;

   protected  static $newClass = null;

   protected static $query;

   public function __construct()
   {
       try {
           self::$db = $this->pdo = new PDO('mysql:host=localhost;dbname=mvc_project_db', "root", "");
       }catch (PDOException $exception){

           die($exception->getMessage("HATA VERİ TABANINA BAĞLANAMADI"));
       }
   }

   public static function table($column, $table, $value)
   {
       self::$query = "select * from $table where $column = '$value'";


       if(self::$newClass === null)
       {
           $object = new DB();
           $object->exits(self::$query);
         //return self::exits(self::$query);
         // return (new static())->exits();
       }
   }


}