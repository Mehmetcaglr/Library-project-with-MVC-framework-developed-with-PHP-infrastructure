<?php
namespace  App\Model\Product;

use App\Model\Model;

class Product extends Model
{


    protected  $table = "products";

    protected  $primaryKey = "product_id";

    protected $fillable = [];

}