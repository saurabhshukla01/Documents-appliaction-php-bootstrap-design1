<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class BatchController extends Controller {

   public function index() {
      return view("backend/batch-new");
   }

   
}
