<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultModel extends Model
{
   protected $table ="result";
   protected $fillable =["studentid","marks","assignment_1","assignment_2","assignment_3","assignment_4","teacherid","courseid","year","semester"];
}
