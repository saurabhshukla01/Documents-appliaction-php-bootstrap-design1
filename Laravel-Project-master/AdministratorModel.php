<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministratorModel extends Model
{
     protected $table = "administrator";
    protected $fillable = ["name","salary", "email", "password", "type", "picture"];
}
