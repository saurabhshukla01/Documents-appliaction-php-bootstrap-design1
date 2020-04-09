<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = "student";
    protected $fillable = ['name', 'fatherName', 'motherName', 'email', 'password', 'address', 'contact', 'admissionFees', 'gender','dob','date','departmentid','year','semester','picture'];
}
