<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McqResultModel extends Model {

   protected $table = "mcq_result";   
   protected $fillable = ["studentid", "gpa", "date", "subjectid"];

}
