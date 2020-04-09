<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsalaryModel extends Model
{
    protected $table = "tsalary";
    protected $fillable = [ "teacherid", "date", "amount"];
}
