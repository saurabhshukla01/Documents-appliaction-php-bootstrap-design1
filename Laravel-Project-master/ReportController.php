<?php

namespace App\Http\Controllers;

use App\TeacherModel;
use App\StudentModel;
use App\CourseModel;
use App\ResultModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $type = $request->session()->get("mytype");
            if ($type == NULL) {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index() {
        return view("backend/report");
    }

    public function load_student(Request $request) {
        $allStudent = DB::table('student')
                ->join('batch', 'student.id', '=', 'batch.studentid')
                ->select('student.id', 'student.name')
                ->where("batch.year", $_GET['year'])
                ->where("batch.semester", $_GET['sem'])
                ->groupBy("student.id")
                ->orderBy("student.name", "desc")
                ->paginate();
        $type = $request->session()->get("mytype");
        $id = $request->session()->get("myid");

        $data = "<option value='0'>Choose student</option>";
        if ($type != 's') {
            $data .= "<option value='all'>All Student</option>";
        }
        
        foreach ($allStudent as $value) {
            if ($type == 's') {
                if ($value->id == $id) {
                    $data .= "<option value=\"{$value->id}\">{$value->name}</option>";
                }
            } else {
                $data .= "<option value=\"{$value->id}\">{$value->name}</option>";
            }
        }
        return $data;
    }

    public function load_course() {
        $allCourse = DB::table('course')
                ->join('batch', 'course.id', '=', 'batch.courseid')
                ->select('course.id', 'course.name')
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

    public function load_result() {
        if($_GET['studentid'] == "all"){
            $allStd = DB::table('result')
                ->join('student', 'result.studentid', '=', 'student.id')
                ->join('teacher', 'result.teacherid', '=', 'teacher.id')
                ->join('course', 'result.courseid', '=', 'course.id')
                ->select('result.*', 'student.name as sname', 'teacher.name as tname', 'course.name as cname')
                ->where("result.year", $_GET['year'])
                ->where("result.semester", $_GET['sem'])
                ->where("course.id", $_GET['courseid'])                
                ->orderBy("result.id", "asc")
                ->paginate();
        }
        else{
            $allStd = DB::table('result')
                ->join('student', 'result.studentid', '=', 'student.id')
                ->join('teacher', 'result.teacherid', '=', 'teacher.id')
                ->join('course', 'result.courseid', '=', 'course.id')
                ->select('result.*', 'student.name as sname', 'teacher.name as tname', 'course.name as cname')
                ->where("student.id", $_GET['studentid'])
                ->where("result.year", $_GET['year'])
                ->where("result.semester", $_GET['sem'])
                ->where("course.id", $_GET['courseid'])                
                ->orderBy("result.id", "asc")
                ->paginate();
        }
        $data = '<table width="600px" border="1" bgcolor="#FFCC99">
                        <tr>
                           <td>Name</td>
                           <td>Final Marks</td>
                           <td>Assignment-1</td>
                           <td>Assignment-2</td>
                           <td>Assignment-3</td>
                           <td>Assignment-4</td>
                            <td>Teacher Name</td>
                            <td>Course Name</td>
                            <td>Year</td>
                            <td>Semester</td>
                        </tr>';
        foreach ($allStd as $value) {
            $data .= "<tr>";
            $data .= "<input type='hidden' name='stdid[]' value=\"{$value->id}\" />";
            $data .= "<td>{$value->sname}: </td>";
            $data .= "<td>{$value->marks}</td>";
            $data .= "<td>{$value->assignment_1}</td>";
            $data .= "<td>{$value->assignment_2}</td>";
            $data .= "<td>{$value->assignment_3}</td>";
            $data .= "<td>{$value->assignment_4}</td>";
            $data .= "<td>{$value->tname}</td>";
            $data .= "<td>{$value->cname}</td>";
            $data .= "<td>{$value->year}</td>";
            $data .= "<td>{$value->semester}</td>";
            $data .= "</tr>";
        }
        $data .= "</table>";
        return $data;
    }

}
