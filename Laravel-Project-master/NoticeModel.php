<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    protected $table = "notice";   
    protected $fillable = ["title", "description", "date"];
}
