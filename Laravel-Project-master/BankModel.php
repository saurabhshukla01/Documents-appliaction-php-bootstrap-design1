<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
   protected $table ="bank";
   protected $fillable =["account_head","debit","credit","remarks","date"];
}

