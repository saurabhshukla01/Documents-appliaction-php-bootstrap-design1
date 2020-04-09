<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\CourseModel;
use App\DepartmentModel;
use App\CreditModel;
use Illuminate\Http\Request;
use App\Http\Requests;

class CreditController extends Controller {

    public function index() {
        $data = CourseModel::all();
        $data1 = DepartmentModel::all();
        return view("backend/credit-new")->with("allCourse", $data )->with("allDepart", $data1 );
    }
    
    //Store/insert function start from here
    public function store(Request $request) {
        $this->validate($request, ["year" => "required"]);
        $data = array(
            "year" => $_POST['year'],
            "departmentid" => $_POST['departid'],
            "courseid" => $_POST['coursid'],
           
        );
        $result = CreditModel::create($data);
        if ($result) {
            return redirect('/credit-management')->with('message', 'Save Successful');
        } else {
            echo 'Some error occurs';
        }
    }
    //View function start from here
    public function view(){
        $data = DB::table('credit')
                ->join('department', 'credit.departmentid', '=', 'department.id')
                ->join('course', 'credit.courseid', '=', 'course.id')
                ->select('credit.*','department.name as dname', 'course.name as cname')->paginate();
        
        return view('backend/credit-view')->with('allCredit', $data);
        
    }
    
    public function edit($id){
        $data2 = DepartmentModel::all();
        $data1 = CourseModel::all();
        $data = DB::table('credit')->where("id", $id)->paginate();
        return view("backend/credit-edit")->with("editCredit", $data)->with('allCourse', $data1)->with('allDepart', $data2);
    }
    
    public function update(Request $request){
      $data = array(
          "year" => $_POST['year'],
          "departmentid" => $_POST['departid'],
          "courseid" => $_POST['coursid']
      );
      
      $result = DB::table("credit")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/credit-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/credit-management/view')->with('message', 'Some error occurs');
      }
   }
   public function delete($id) {
      $result = DB::table("credit")->where("id", $id)->delete();
      if ($result) {
         return redirect('/credit-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/credit-management/view')->with('message', 'Some error occurs');
      }
   }

}
