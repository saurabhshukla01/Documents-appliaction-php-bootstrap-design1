<?php

namespace App\Http\Controllers;

use App\AttendenceModel;
use App\TeacherModel;
use App\StudentModel;
use App\CourseModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller {

    public function index() {
        return view("backend/daily-attendence");
    }

    /*
      CREATE TABLE attendence(
      id int unsigned not null AUTO_INCREMENT,
      studentid int unsigned not null,
      teacherid SMALLINT unsigned not null,
      year tinyint unsigned not null,
      semester tinyint unsigned not null,
      date datetime not null,
      PRIMARY KEY(id),
      FOREIGN KEY(studentid) REFERENCES student(id),
      FOREIGN KEY(teacherid) REFERENCES teacher(id)
      )
     * 
     */

    public function store(Request $request) {
        $stdid = $_POST['stdid'];
        foreach ($stdid as $v) {
            $data = array(
                "studentid" => $v,
                "teacherid" => $_POST['teacherid'],
                "year" => $_POST['year'],
                "semester" => $_POST['semester'],
                "date" => date("Y-m-d H:i:s"),
                "status" => $_POST["pa_{$v}"]
            );
            $result = AttendenceModel::create($data);
        }
        if ($result) {
            return redirect('/daily-attendence')->with('message', 'Save Successful');
        } else {
            echo 'Some error occurs';
        }
    }

    public function load_teacher() {
        $allTeacher = DB::table('teacher')
                ->join('batch', 'teacher.id', '=', 'batch.teacherid')
                ->select('teacher.id', 'teacher.name')
                ->where("batch.year", $_GET['year'])
                ->where("batch.semester", $_GET['sem'])
                ->groupBy("teacher.id")
                ->orderBy("teacher.name", "desc")
                ->paginate();
        $data = "<option value='0'>Choose Teacher</option>";
        foreach ($allTeacher as $value) {
            $data .= "<option value=\"{$value->id}\">{$value->name}</option>";
        }
        return $data;
    }

    public function load_course() {
        $allCourse = DB::table('course')
                ->join('batch', 'course.id', '=', 'batch.courseid')
                ->select('course.id', 'course.name')
                ->where("batch.teacherid", $_GET['teacherid'])
                ->where("batch.year", $_GET['year'])
                ->where("batch.semester", $_GET['sem'])
                ->groupBy("course.id")
                ->orderBy("course.name", "desc")
                ->paginate();
        $data = "<option value='0'>Choose Course</option>";
        foreach ($allCourse as $value) {
            $data .= "<option value=\"{$value->id}\">{$value->name}</option>";
        }
        return $data;
    }

    public function load_student() {
        $allStd = DB::table('student')
                ->join('batch', 'student.id', '=', 'batch.studentid')
                ->select('student.id', 'student.name')
                ->where("batch.teacherid", $_GET['teacherid'])
                ->where("batch.year", $_GET['year'])
                ->where("batch.semester", $_GET['sem'])
                ->where("batch.courseid", $_GET['courseid'])
                ->orderBy("student.id", "asc")
                ->paginate();
        $data = "";
        foreach ($allStd as $value) {
            $data .= "<input type='hidden' name='stdid[]' value=\"{$value->id}\" />";
            $data .= "{$value->name}: ";
            $data .= "<input type='radio' checked name='pa_{$value->id}' value='p' />Present";
            $data .= "<input type='radio' name='pa_{$value->id}' value='a' />Absent<br /><br />";
        }
        return $data;
    }

    public function view(Request $request) {
       $allattendence = DB::table('attendence')
                ->join('student', 'attendence.studentid', '=', 'student.id')
                ->join('teacher', 'attendence.teacherid', '=', 'teacher.id')
                ->select('attendence.*', 'student.name as stname', 'teacher.name as tname')
                
                ->paginate();
        return view("backend/daily-attendence-view")->with("allatten", $allattendence);
    }

}
