<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model {

   protected $table = "product";   
   protected $fillable = ["title", "description", "price", "vat", "discount", "categoryid"];

}
