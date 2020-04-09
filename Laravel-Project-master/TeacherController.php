<?php

namespace App\Http\Controllers;

use App\TeacherModel;
use App\BankModel;
use App\DepartmentModel;
use App\DesignationModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {

   public function index() {
      $data = DepartmentModel::all();
      $data1 = DesignationModel::all();
      return view("backend/teacher-new")->with("allDepart", $data)->with("allDgn", $data1);
   }

   public function store(Request $request) {

      $this->validate($request,[
          "tname" => "required | max:50",
          "tcontact" => "required | max:20",
          "tmail" => "required | max:40",
          "tpass" => "required",
          "departid" => "required",
          "dgnid" => "required",
          "salary" => "required",
          "gender" => "required",
          "tpic" => ""
      ]);
      $file = $request->file('tpic');
      $ext = "";
      if ($file) {
         $ext = strtolower($file->getClientOriginalExtension());
         if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
            $ext = "";
         }
      }
      $data = array(
          "name" => $_POST['tname'],
          "contact" => $_POST['tcontact'],
          "email" => $_POST['tmail'],
          "password" => $_POST['tpass'],
          "departmentid" => $_POST['departid'],
          "designationid" => $_POST['dgnid'],
          "salary" => $_POST['salary'],
          "gender" => $_POST['gender'],
          "picture" => $ext
      );
      $id = TeacherModel::create($data)->id;
      if ($id) {
      
            $data = array(
                "account_head" => "Teacher Salary",
                "debit" => 0,
                "credit" => $_POST['salary'],
                "remarks" => "Teacher ID: " . $id,
                "date" => date("Y-m-d")
            );
            
            BankModel::create($data);
      
      
      
         if ($ext != "") {
            $destinationPath = 'images/teacher';
            $file->move($destinationPath, "teacher-{$id}.{$ext}");
         }
         return redirect('/teacher-management')->with('message', 'Successfilly save');
      } else {
         redirect('/teacher-management')->with('message', 'Server is too busy');
      }
   }

   public function view() {
      $data = DB::table('teacher')
                      ->join('department', 'teacher.departmentid', '=', 'department.id')
                      ->join('designation', 'teacher.designationid', '=', 'designation.id')
                      ->select('teacher.*', 'department.name as dname', 'designation.name as dgname')->paginate();
      return view("backend/teacher-view")->with('allTeach', $data);
   }

   public function edit($id) {
      $data = DepartmentModel::all();
      $data1 = DesignationModel::all();
      $data2 = DB::table("teacher")->where("id", $id)->paginate();

      return view("backend/teacher-edit")->with("selTeach", $data2)->with("allDgn", $data1)->with("allDepart", $data);
   }

   public function update(Request $request) {
      $id = $_POST['id'];
      $data2 = DB::table("teacher")->where("id", $id)->paginate();
      foreach ($data2 as $v) {
         $old_ext = $v->picture;
      }
      $file = $request->file('tpic');
      $ext = "";
      if ($file) {
         $ext = strtolower($file->getClientOriginalExtension());
         if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
            $ext = $old_ext;
         } else {
            if (file_exists("images/teacher/teacher-{$id}.{$old_ext}")) {
               unlink("images/teacher/teacher-{$id}.{$old_ext}");
            }
            $destinationPath = 'images/teacher';
            $file->move($destinationPath, "teacher-{$id}.{$ext}");
         }
      } else {
         $ext = $old_ext;
      }

      $data = array(
          "name" => $_POST['tname'],
          "contact" => $_POST['contact'],
          "email" => $_POST['email'],
          "password" => $_POST['pass'],
          "departmentid" => $_POST['departid'],
          "designationid" => $_POST['dgnid'],
          "salary" => $_POST['salary'],
          "gender" => $_POST['gender'],
          "picture" => $ext
      );
      $result = DB::table("teacher")->where("id", $_POST['id'])->update($data);

      if ($result) {
         return redirect('/teacher-management/view')->with('message', 'Update successfull');
      } else {
         return redirect('/teacher-management/view')->with('message', 'Some occurse error');
      }
   }

   public function delete($id) {
      $data2 = DB::table("teacher")->where("id", $id)->paginate();
      foreach ($data2 as $v) {
         $old_ext = $v->picture;
      }
      if (file_exists("images/teacher/teacher-{$id}.{$old_ext}")) {
         unlink("images/teacher/teacher-{$id}.{$old_ext}");
      }
      $result = DB::table("teacher")->where('id', $id)->delete();
      if ($result) {
         return redirect('/teacher-management/view')->with('message', 'Delete Successfull');
      } else {
         return redirect('teacher-management/view')->with('message', 'Some error occurs');
      }
   }

}
