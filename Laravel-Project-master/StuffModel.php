<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuffModel extends Model {

    protected $table = "stuff";
    protected $fillable = ["name","contact","salary","email","password","departmentid","designation","gender","picture"];

}
