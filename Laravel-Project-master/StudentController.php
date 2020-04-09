<?php

namespace App\Http\Controllers;

use App\StudentModel;
use App\BankModel;
use App\DepartmentModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {
    
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $type = $request->session()->get("mytype");
            if ($type != 'a') {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index() {
        $data = DepartmentModel::all();
        return view("backend/student-new")->with('alldepart', $data)->with("sel_menu", "student");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required",
            "fname" => "required",
            "mname" => "required",
            "email" => "required",
            "pass" => "required",
            "addr" => "required",
            "contact" => "required",
            "afees" => "required",
            "gender" => "",
            "dob" => "required",            
            "year" => "required",
            "seme" => "required",
        ]);

        $file = $request->file("pic");
        $ext = "";
        if ($file) {
            $ext = strtolower($file->getClientOriginalExtension());
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = "";
            }
        }

        $data = array(
            "name" => $_POST['name'],
            "fatherName" => $_POST['fname'],
            "motherName" => $_POST['mname'],
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "address" => $_POST['addr'],
            "contact" => $_POST['contact'],
            "admissionFees" => $_POST['afees'],
            "gender" => $_POST['gender'],
            "dob" => $_POST['dob'],
            "date" => date("Y-m-d"),
            "departmentid" => $_POST['departid'],
            "year" => $_POST['year'],
            "semester" => $_POST['seme'],
            "picture" => $ext
        );

        $id = StudentModel::create($data)->id;
        if ($id) {
            $data = array(
                "account_head" => "Admission Fees",
                "debit" => 0,
                "credit" => $_POST['afees'],
                "remarks" => "Student ID: " . $id,
                "date" => date("Y-m-d")
            );
            
            BankModel::create($data);
            
            
            if ($ext != "") {
                $destinationPath = 'images/student';
                $file->move($destinationPath, "student-{$id}.{$ext}");
            }
            return redirect('/student-management')->with('message', 'Save Successfull');
        } else {
            echo 'Some error occurs';
        }
    }

    public function view() {
        $data = DB::table('student')
                        ->join('department', 'student.departmentid', '=', 'department.id')
                        ->select('student.*', 'department.name as dname')->paginate();

        return view('backend/student-view')->with('allStd', $data)->with("sel_menu", "student");
    }

    public function edit($id) {
        $data = DepartmentModel::all();
        $data1 = DB::table('student')->where("id", $id)->paginate();
        return view("backend/student-edit")->with("editStd", $data1)->with('alldepart', $data);
    }

    public function update(Request $request) {
        $id = $_POST['id'];
        $data1 = DB::table('student')->where("id", $id)->paginate();

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
                $request->session()->put("mypicture", $ext);
            }
        } else {
            $ext = $old_ext;
        }

        $data = array(
            "name" => $_POST['name'],
            "fatherName" => $_POST['fname'],
            "motherName" => $_POST['mname'],
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "address" => $_POST['addr'],
            "contact" => $_POST['contact'],
            "admissionFees" => $_POST['afees'],
            //"gender" => $_POST['gender'],
            "dob" => $_POST['dob'],
            "date" => $_POST['date'],
            "departmentid" => $_POST['departid'],
            "year" => $_POST['year'],
            "semester" => $_POST['seme'],
            "picture" => $ext
        );


        $result = DB::table('student')->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/student-management/view')->with('message', 'Update Successfull');
        } else {
            return redirect('/student-management/view')->with('message', 'Some Error Occurs');
        }
    }

    public function delete($id) {
        $result = DB::table('student')->where("id", $id)->delete();
        if ($result) {
            return redirect('/student-management/view')->with('message', 'Delete Successfull');
        } else {
            return redirect('/student-management/view')->with('message', 'Some Error Occurs');
        }
    }

    public function ajaxdata() {
        $allTeacher = DB::table('teacher')
                        ->select('id', 'name')->orderBy("name", "desc")->paginate();
        $data = "";
        foreach ($allTeacher as $value) {
            $data .= "<option value=\"{$value->id}\">{$value->name}</option>";
        }
        return $data;
    }

}
