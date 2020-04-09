<?php

namespace App\Http\Controllers;

use App\StudentModel;
use App\DepartmentModel;
use App\DesignationModel;
use App\GalleryModel;
use App\StuffModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class StuffController extends Controller {

    public function index() {
       // $data = StuffModel::all();
        $data1 = DepartmentModel::all();
        $data2 = DesignationModel::all();
        return view("backend/stuff")->with("allDpart", $data1)->with("allpart", $data2);
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required|max:50",
            "cont" => "required|max:15",
            "email" => "required",
            "pass" => "required|max:12",
            "did" => "required",
            "des" => "required",
            "salary" => "required",
            "gen" => "required",
            "pic" => ""
        ]);
        $file = $request->file('pic');
        $ext = "";
        if ($file) {
            $ext = strtolower($file->getClientOriginalExtension());
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = "";
            }
        }
        $data = array(
            "name" => $_POST['name'],
            "contact" => $_POST['cont'],
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "departmentid" => $_POST['did'],
            "designation" => $_POST['des'],
            "salary" => $_POST['salary'],
            "gender" => $_POST['gen'],
            "picture" => $ext
        );
        $id = StuffModel::create($data)->id;
        if ($id) {
            if ($ext != "") {
                $destinationPath = 'images/student';
                $file->move($destinationPath, "student-{$id}.{$ext}");
            }
            return redirect('/stuff-management')->with('message', 'Save Successful');
        } else {
            return redirect('/stuff-management')->with('message', 'Server too bussy');
        }
    }

    public function view(){
        $data = DB::table('stuff')
                ->join('department', 'stuff.departmentid', '=', 'department.id')
				->join('designation', 'stuff.designation', '=', 'designation.id')
                ->select('stuff.*','department.name as dname','designation.name as cname')->paginate();
				

        
        return view('backend/stuff-view')->with('allStd', $data);
        
    }

    public function edit($id) {
        $data1 = DepartmentModel::all();
        $data2 = DesignationModel::all();
        $data = DB::table("stuff")->where("id", $id)->paginate();
        return view("backend/stuff-edit")->with("selStd", $data)->with("allDpart", $data1)->with("allpart", $data2);
    }

    public function update(Request $request) {
		 $id = $_POST['id'];
        $data1 = DB::table('stuff')->where("id", $id)->paginate();

        foreach ($data1 as $value) {
            $old_ext = $value->picture;
        }

        $file = $request->file("pic");
        $ext = "";
        if ($file) {
            $ext = strtolower($file->getClientOriginalExtension());
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/student/student-{$id}.{$old_ext}")) {
                    unlink(("images/student/student-{$id}.{$old_ext}"));
                }
                $destinationPath = 'images/student';
                $file->move($destinationPath, "student-{$id}.{$ext}");
                $request->session()->put("", $ext);
            }
        } else {
            $ext = $old_ext;
        }
        $data = array(
            "name" => $_POST['name'],
            "contact" => $_POST['cont'],
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "departmentid" => $_POST['did'],
            "designation" => $_POST['des'],
            "salary" => $_POST['salary'],
            "gender" => $_POST['gen'],
            "picture" => $ext
        );

        $result = DB::table("stuff")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/stuff-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/stuff-management/view')->with('message', 'Some error occurs');
        }
    }

    public function delete($id) {
        $result = DB::table("stuff")->where("id", $id)->delete();
        if ($result) {
            return redirect('/stuff-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/stuff-management/view')->with('message', 'Some error occurs');
        }
    }

}
