<?php

namespace App\Http\Controllers;

use App\SubjectModel;
use App\CourseModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller {

    public function index() {
        $data = CourseModel::all();
        return view("backend/subject")->with("allcour", $data);
    }

    public function store(Request $request) {
        $this->validate($request,[
            "name" => "required|max:50",
            "cid" => "required"
        ]);
        $data = array(
            "name" => $_POST['name'],
            "courseid" => $_POST['cid']
        );

        $result = SubjectModel::create($data);
        if ($result) {
            return redirect('/subject-management')->with('message', 'Save Successful');
        } else {
            echo "Some errer occurs";
        }
    }

    public function view() {
        $data = DB::table('subject')
                        ->join('course', 'subject.courseid', '=', 'course.id')
                        ->select('subject.*', 'course.name as cname')->paginate();


        return view("backend/subject-view")->with("allcou", $data);
    }

    public function edit($id) {
        $data1 = CourseModel::all();
        $data = DB::table("subject")->where("id", $id)->paginate();
        return view("backend/subject-edit")->with("slecou", $data)->with("allcour", $data1);
    }

    public function update(Request $request) {
        $data = array(
            "name" => $_POST['name'],
            "courseid" => $_POST['cid']
        );


        $result = DB::table("subject")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/subject-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/subject-management/view')->with('message', 'Some error occurs');
        }
    }

    public function delete($id) {
        $result = DB::table("subject")->where("id", $id)->delete();
        if ($result) {
            return redirect('/subject-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/subject-management/view')->with('message', 'Some error occurs');
        }
    }

}
