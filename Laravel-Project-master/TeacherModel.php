<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = "teacher";
    protected $fillable = ["name", "contact", "email", "password", "departmentid", "designationid", "salary", "gender", "picture"];
}

