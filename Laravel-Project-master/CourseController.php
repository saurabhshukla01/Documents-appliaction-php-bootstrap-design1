<?php

namespace App\Http\Controllers;

use App\CourseModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller {

     public function index() {
        return view("backend/course");
    }
  /*public function __construct() {
      $this->middleware(function ($request, $next) {
                 $type = $request->session()->get("mytype");
                 if($type != 'a'){
                     return redirect('/');
                 }
                 return $next($request);
              });
   } */

   /*public function index() {
      echo CourseModel::all()->count();
     //echo $test->TestIdb();
      
      echo "<pre>";
     // print_r($test);
      echo "</pre>";
      
      $data = DB::table('course')
                      ->select("course.*")->paginate();
      //return view("backend/course-view")->with("allstd", $data);
      
   }*/

   public function store(Request $request) {
      $this->validate($request, [
          "cname" => "required|max:50"
      ]);
      $data = array(
          "name" => $_POST['cname'],
          "credit" => $_POST['credit'],
          "description" => $_POST['desc']
      );

      $result = CourseModel::create($data);
      if ($result) {
         return redirect('/course-management')->with('message', 'Save Successful');
      } else {
         echo "Some errer occurs";
      }
   }

  /* public function create() {
      return view("backend/course");
   }*/
    public function view(){
        $data = DB::table('course');
          $data = DB::table("course")->paginate();
          return view("backend/course-view")->with("allCourses", $data);
    }
    

   public function edit($id) {

      $data = DB::table("course")->where("id", $id)->paginate();
      return view("backend/course-edit")->with("allCourses", $data);
   }

   public function update(Request $request) {
      $data = array(
          "name" => $_POST['name'],
          "credit" => $_POST['credit'],
          "description" => $_POST['desc']
      );


      $result = DB::table("course")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/course-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/course-management/view')->with('message', 'Some error occurs');
      }
   }

   public function delete($id) {
      $result = DB::table("course")->where("id", $id)->delete();
      if ($result) {
         return redirect('/course-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/course-management/view')->with('message', 'Some error occurs');
      }
   }

}