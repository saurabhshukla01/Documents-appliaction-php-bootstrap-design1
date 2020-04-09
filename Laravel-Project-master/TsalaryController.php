<?php

namespace App\Http\Controllers;
use App\TeacherModel;
use App\TsalaryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class TsalaryController extends Controller
{
    public function index() {
        $data = TeacherModel::all();
        return view("backend/tsalary")->with('allte', $data);
}
 public function store(Request $request) {
        $this->validate($request, [
            "teid" => "required",
            "date" => "required",
            "amount" => "required|numeric"
        ]);
        $data = array(
            "teacherid" => $_POST['teid'],
            "date" => $_POST['date'],
            "amount" => $_POST['amount']
        );
       // print_r($data);
        $result = TsalaryModel::create($data);
        
        if ($result) {
            return redirect('/tsalary-management')->with('message', 'Save successful');
        } else {
            echo 'Some error occurs';
        }
    }
    
   public function view(){
        $data = DB::table('tsalary')
        ->join('teacher', 'tsalary.teacherid', '=', 'teacher.id')
                ->select('tsalary.*', 'teacher.name as tname')->paginate();
        
        return view("backend/tsalary-view")->with("allte", $data);
    }
     public function edit($id) {
      $data1 = TsalaryModel::all();
      $data = DB::table("tsalary")->where("id", $id)->paginate();
      return view("backend/tsalary-edit")->with("selte", $data)->with("allte", $data1);
   }
   public function update(Request $request){
      $data = array(
          
         "teacherid" => $_POST['teid'],
         "date" => $_POST['date'],
         "amount" => $_POST['amount']
      );
      $result = DB::table("tsalary")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/tsalary-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/tsalary-management/view')->with('message', 'Some error occurs');
      }
      
   }
    public function delete($id) {
      $result = DB::table("tsalary")->where("id", $id)->delete();
      if ($result) {
         return redirect('/tsalary-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/tsalary-management/view')->with('message', 'Some error occurs');
      }
   }
}