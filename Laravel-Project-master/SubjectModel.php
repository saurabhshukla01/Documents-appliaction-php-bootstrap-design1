<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table = "subject";
    protected $fillable = ["name","courseid"]; 
}
