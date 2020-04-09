<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
     protected $table = "expense";   
     protected $fillable = ["name", "description", "amount", "date"];
}
