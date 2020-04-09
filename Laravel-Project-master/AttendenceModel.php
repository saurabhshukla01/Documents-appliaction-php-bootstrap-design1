<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendenceModel extends Model
{
   protected $table ="attendence";
   protected $fillable =["studentid","teacherid","year","semester","date","status"];
}
