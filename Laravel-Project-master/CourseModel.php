<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = "course";
    protected $fillable = ["name","credit","description"];
}
