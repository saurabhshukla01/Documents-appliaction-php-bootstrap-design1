<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditModel extends Model
{
    protected $table = "credit";
    protected $fillable = ['year','departmentid','courseid'];
    
    public function TestIdb(){
       return "Muzammil";
    }
}
