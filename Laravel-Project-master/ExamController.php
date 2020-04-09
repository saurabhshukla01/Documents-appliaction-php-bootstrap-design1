<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\McqResultModel;
use Illuminate\Http\Request;
use App\Http\Requests;

class ExamController extends Controller {

    public function index(Request $request) {
        $a = $request->session()->get("qid");
        $b = $request->session()->get("ans");
        
        $request->session()->forget("subjectid");
        $request->session()->forget("qid");
        $request->session()->forget("ans");
        
        $a = $request->session()->get("qid");
        $b = $request->session()->get("ans");
        
        print_r($a);
        print_r($b);
                        
        $data = DB::table('subject')
                        ->select("*")->paginate();
        return view("backend/online-exam")->with("data", $data);
    }

    public function load_question(Request $request) {
        $subid = $request->session()->get("subjectid");
        $questionid = $request->session()->get("qid");
        $answer = $request->session()->get("ans");
        
        if($questionid){
            $answer[] = $_POST['ans'];
            $request->session()->put("ans", $answer);
            
            $counter = count($questionid) + 1;
            $data = DB::table("question")->select("*")->where("subjectid", $subid)->whereNotIn("id", $questionid)->inRandomOrder()->paginate(1);
        }
        else{
            $counter = 1;
            $data = DB::table("question")->select("*")->where("subjectid", $subid)->inRandomOrder()->paginate(1);
        }
        
        $question = "";
        if(count($answer) < 5){
            foreach ($data as $value){
            $question .= "<h3>{$counter}. {$value->title}</h3><hr />";
            $question .= "<p><input type='radio' name='opt' value='1'/> {$value->opt_1}</p>";
            $question .= "<p><input type='radio' name='opt' value='2'/> {$value->opt_2}</p>";
            if($value->opt_3 != ""){
            $question .= "<p><input type='radio' name='opt' value='3'/> {$value->opt_3}</p>";
            }
             if($value->opt_4 != ""){
            $question .= "<p><input type='radio' name='opt' value='4'/> {$value->opt_4}</p>";
             }
             $question .= "<br /><input type='submit' id='exam_start' class='btn btn-success' value='Next' />";
             
             $questionid[] = $value->id;
             $request->session()->put("qid", $questionid);
        }
        }
        else{
            $ca = 0;
            for($i=0; $i < count($questionid); $i++){
                $data =DB::table("question")
                                ->select("*")
                                ->where("id", $questionid[$i])
                                ->paginate(1);
                foreach ($data as $value){
                    if($value->answer == $answer[$i]){
                        $ca++;
                    }
                }
            }
            $total = ($ca*100)/5;
            
            $field = array(
                "gpa" => $total

            );
            
            DB::table("mcq_result")
                    ->where("studentid", $request->session()->get("myid"))
                    ->where("subjectid", $request->session()->get("subjectid"))
                    ->where("date", date("Y-m-d"))
                    ->update($field);
            
            $question = "<h2>Exam Completed.</h2>";
            $question .= "<p>You have got: " . $total . "%</p>";
            $question .= "<div class='progress' style='height: 30px;'>
                            <div class='progress-bar progress-bar-success' role='progressbar' style=\"width: {$total}%;\">
                            </div>
                        </div>";
            
        }
        return $question;
    }

    public function exam_avaliable(Request $request) {
        date_default_timezone_set("Asia/Dhaka");

        $data = DB::table('mcq_result')->where("studentid", $request->session()->get("myid"))->where("subjectid", $_POST['id'])->where("date", date("Y-m-d"))->get();


        if (isset($data[0])) {
            return 1;
        } else {
            $sdata = array(
                "studentid" => $request->session()->get("myid"),
                "gpa" => 0.00,
                "date" => date("Y-m-d"),
                "subjectid" => $_POST['id']
            );
            $result = McqResultModel::create($sdata);
            if ($result) {
                $request->session()->put("subjectid", $_POST['id']);
                return 2;
            } else {
                return 3;
            }
        }
    }
    
    public function view(Request $request){
        //return  view('backend/view-online-result');
       $allResult = DB::table('mcq_result')
               ->join('student', 'mcq_result.studentid', '=', 'student.id')
               ->join('subject', 'mcq_result.subjectid', '=','subject.id' )
                ->select('mcq_result.*','subject.name as sname')
                ->where("studentid", $request->session()->get("myid"))
                ->paginate();
      return view("backend/view-online-result")->with("result", $allResult);
      
    }

}
