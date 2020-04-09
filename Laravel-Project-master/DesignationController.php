<?php

namespace App\Http\Controllers;

use App\DesignationModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller {

    public function index() {
        return view("backend/designation-management");
    }

    public function dgstore(Request $request) {
        $this->validate($request, [
            "dgname" => "required|max:50"
        ]);
        $data = array(
            "name" => $_POST['dgname']
        );
        $result = DesignationModel::create($data);
        if ($result) {
            return redirect('/designation-management')->with('massage', 'Save Successful');
        } else {
            echo 'Some error occurs';
        }
    }
    public function view(){
        $data = DB::table('designation')
          ->select("designation.*")->paginate();
          return view("backend/designation-view")->with("allstd", $data);
    }
    public function edit($id) {
        
        $data = DB::table("designation")->where("id", $id)->paginate();
        return view("backend/designation-edit")->with("selstd", $data);
    }
    public function update(Request $request) {
        $data = array(
            "name" => $_POST['name'],
            
        );


        $result = DB::table("designation")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/designation-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/designation-management/view')->with('message', 'Some error occurs');
        }
        
    }
    public function delete($id) {
        $result = DB::table("designation")->where("id", $id)->delete();
        if ($result) {
            return redirect('/designation-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/designation-management/view')->with('message', 'Some error occurs');
        }
    }
    
    

}
