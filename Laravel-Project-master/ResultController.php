<?php

namespace App\Http\Controllers;

use App\TeacherModel;
use App\StudentModel;
use App\CourseModel;
use App\ResultModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller {

   public function index() {
      return view("backend/result");
   }
   
   public function store(Request $request) {
      $stdid = $_POST['stdid'];
      foreach ($stdid as $v) {
         $data = array(
             "studentid" => $v,
             "marks" => $_POST["m_{$v}"],
             "assignment_1" => $_POST["a1_{$v}"],
             "assignment_2" => $_POST["a2_{$v}"],
             "assignment_3" => $_POST["a3_{$v}"],
             "assignment_4" => $_POST["a4_{$v}"],
             "teacherid" => $_POST["teacherid"],
             "courseid" => $_POST["courseid"],
             "year" => $_POST['year'],
             "semester" => $_POST['semester']
         );
         $result = ResultModel::create($data);
      }
      if ($result) {
         return redirect('/exam-result')->with('message', 'Save Successful');
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
      $data = '<table width="600px" border="1">
                        <tr>
                           <td>Name</td>
                           <td>Final Marks</td>
                           <td>Assignment-1</td>
                           <td>Assignment-2</td>
                           <td>Assignment-3</td>
                           <td>Assignment-4</td>
                        </tr>';
      foreach ($allStd as $value) {
         $data .= "<tr>";
         $data .= "<input type='hidden' name='stdid[]' value=\"{$value->id}\" />";
         $data .= "<td>{$value->name}: </td>";
         $data .= "<td><input type='text' name='m_{$value->id}' required /></td>";
         $data .= "<td><input type='text' name='a1_{$value->id}' required /></td>";
         $data .= "<td><input type='text' name='a2_{$value->id}' required /></td>";
         $data .= "<td><input type='text' name='a3_{$value->id}' required /></td>";
         $data .= "<td><input type='text' name='a4_{$value->id}' required /></td>";
         $data .= "</tr>";
      }
      $data .= "</table>";
      return $data;
   }

}
