<?php

namespace App\Http\Controllers;

use App\SemesterfeesModel;
use App\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\BankModel;

class SemesterfeesController extends Controller {

   public function index() {
      $data = StudentModel::all();
      return view("backend/semesterfees")->with('allstude', $data);
   }

   public function store(Request $request) {
      $this->validate($request,[
          "year" => "required",
          "semester" => "required",
          "stdid" => "required",
          "date" => "required",
          "amou" => "required"
      ]);

      $sel = DB::table("semesterfees")
              ->where("year", $_POST['year'])
              ->where("semester", $_POST['semester'])
              ->where("studentid", $_POST['stdid'])
              ->get();
      if (isset($data[0])) {
         echo "Aar nibo na";
      } else {
         $data = array(
             "year" => $_POST['year'],
             "semester" => $_POST['semester'],
             "studentid" => $_POST['stdid'],
             "date" => $_POST['date'],
             "amount" => $_POST['amou']
         );

         $id = SemesterfeesModel::create($data)->id;
         if ($id) {
            $data = array(
                "account_head" => "Semester Fees",
                "debit" => 0,
                "credit" => $_POST['amou'],
                "remarks" => "Student ID: {$id}, Year: {$_POST['year']} and Semester: {$_POST['semester']}",
                "date" => date("Y-m-d")
            );            
            BankModel::create($data); 
             
            return redirect('/semesterfees-management')->with('message', 'Save Successful');
         } else {
            return redirect('/semesterfees-management')->with('message', 'Server too bussy');
         }
      }
   }

   public function view() {

      $data = DB::table('semesterfees')
                      ->join('student', 'semesterfees.studentid', '=', 'student.id')
                      ->select('semesterfees.*', 'student.name')->paginate();
      /*
        echo "<pre>";
        print_r($data);
        echo "</pre>";
       *
       * */
      return view("backend/semesterfees-view")->with("allSeme", $data);
   }

   /* ########################## edit function #################################################### */

   public function edit($id) {
      $data1 = StudentModel::all();
      $data = DB::table("semesterfees")->where("id", $id)->paginate();


      return view("backend/semesterfees-edit")->with("selSemes", $data)->with("allstude", $data1);
   }

   /* ########################## update function #################################################### */

   public function update(Request $request) {
      $data = array(
          "year" => $_POST['year'],
          "semester" => $_POST['semester'],
          "studentid" => $_POST['stude'],
          "date" => $_POST['date'],
          "amount" => $_POST['amou']
      );

      $result = DB::table("semesterfees")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/semesterfees-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/semesterfees-management/view')->with('message', 'Some error occurs');
      }
   }

   /* ########################## deletefunction #################################################### */

   public function delete($id) {
      $result = DB::table("semesterfees")->where("id", $id)->delete();
      if ($result) {
         return redirect('/semesterfees-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/semesterfees-management/view')->with('message', 'Some error occurs');
      }
   }

}
