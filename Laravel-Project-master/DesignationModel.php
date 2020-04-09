<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationModel extends Model
{
    protected $table = "designation";
    protected $fillable = ["name"];
}
