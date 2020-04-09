<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamfeesModel extends Model
{
    protected $table = "examfess";
    protected $fillable = ["year", "semester", "studentid", "date", "amount"];
}
