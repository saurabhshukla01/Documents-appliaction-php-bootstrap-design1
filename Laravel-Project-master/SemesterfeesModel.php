<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemesterfeesModel extends Model
{
protected $table = "semesterfees";
protected $fillable = ["year", "semester", "studentid", "date", "amount"];
}

