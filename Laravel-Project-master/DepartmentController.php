<?php

namespace App\Http\Controllers;

use App\DepartmentModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller {

    public function index() {
        return view("backend/department");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "dname" => "required|max:50"
        ]);
        $data = array(
            "name" => $_POST['dname']
        );
        
        
       $result = DepartmentModel::create($data);
        if ($result) {
            return redirect('/department-management')->with('message', 'Save Successful');
        } else {
            echo 'Some error occurs';
        }
    }

     public function view(){
        $data = DB::table('department');
          $data = DB::table("department")->paginate();
          return view("backend/department-view")->with("alldep", $data);
    }
    
     public function edit($id) {
        
        $data = DB::table("department")->where("id", $id)->paginate();
        return view("backend/department-edit")->with("sledep", $data);
    }
    
     public function update(Request $request) {
        $data = array(
            "name" => $_POST['dname'],
            
        );


        $result = DB::table("department")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/department-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/department-management/view')->with('message', 'Some error occurs');
        }
     }
    
      public function delete($id) {
        $result = DB::table("department")->delete();
        if ($result) {
            return redirect('/department-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/department-management/view')->with('message', 'Some error occurs');
        }
    
}
}
