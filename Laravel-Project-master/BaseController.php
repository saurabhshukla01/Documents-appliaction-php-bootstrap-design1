<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class BaseController extends Controller {

   public function index() {
      $data = DB::table('notice')
                      ->select('notice.id', 'notice.title')->paginate(4);
      
      //print_r($data);
      return view("backend/home")->with("allNotice", $data);
   }
   
   public function about_us(){
       return view('frontend/about-us')->with("sel_menu", "about_us");;
   }

   public function course() {
      $data = DB::table('course')->where('name', '=', 'accounting')->get();
      return view("frontend/accounting")->with("allaccounting", $data);
   }

   public function course1() {
      $data = DB::table('course')->where('name', '=', 'finance')->get();
      return view("frontend/finance")->with("allfinance", $data);
   }



}
