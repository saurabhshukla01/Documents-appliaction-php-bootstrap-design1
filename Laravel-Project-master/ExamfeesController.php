<?php

namespace App\Http\Controllers;

use App\StudentModel;
use App\ExamfeesModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ExamfeesController extends Controller {

    public function index() {
        $data = StudentModel::all();
        return view("backend/examfees-management")->with('allStd', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            "year" => "required",
            "seme" => "required|integer",
            "stid" => "required",
            "date" => "required",
            "amount" => "required|numeric"
        ]);
        $data = array(
            "year" => $_POST['year'],
            "semester" => $_POST['seme'],
            "studentid" => $_POST['stid'],
            "date" => $_POST['date'],
            "amount" => $_POST['amount']
        );
        $result = ExamfeesModel::create($data);
        if ($result) {
            return redirect('/examfees-management')->with('message', 'Save successful');
        } else {
            echo 'Some error occurs';
        }
    }
   public function view(){
        $data = DB::table('examfess')
        ->join('student', 'examfess.studentid', '=', 'student.id')
                ->select('examfess.*', 'student.name as sname')->paginate();
        
        return view("backend/examfess-view")->with("allStd", $data);
    }
     public function edit($id) {
      $data1 = StudentModel::all();
      $data = DB::table("examfess")->where("id", $id)->paginate();
      return view("backend/examfees-edit")->with("selStd", $data)->with("allStd", $data1);
   }
   public function update(Request $request){
      $data = array(
          "year" => $_POST['year'],
          "semester" => $_POST['semes'],
          "studentid" => $_POST['stid'],
          "date" => $_POST['date'],
          "amount" => $_POST['amount']
      );
      $result = DB::table("examfess")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/examfees-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/examfees-management/view')->with('message', 'Some error occurs');
      }
      
   }
    public function delete($id) {
      $result = DB::table("examfess")->where("id", $id)->delete();
      if ($result) {
         return redirect('/examfees-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/examfees-management/view')->with('message', 'Some error occurs');
      }
   }
}

