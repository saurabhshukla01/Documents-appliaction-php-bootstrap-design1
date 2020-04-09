<?php

namespace App\Http\Controllers;

use App\NoticeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class PublicController extends Controller
{
   public function index($id){
      $data = DB::table('notice')
                      ->select('notice.*')->where("id", $id)->paginate(1);

      
      return view("backend/notice-publish")->with("publicNotice", $data);
   }
}
