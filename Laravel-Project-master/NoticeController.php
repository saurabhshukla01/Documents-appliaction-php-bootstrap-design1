<?php

namespace App\Http\Controllers;

use App\NoticeModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
	public function __construct() {
        $this->middleware(function ($request, $next) {
            $type = $request->session()->get("mytype");
            if ($type != 'a' | 't') {
                return redirect('/');
            }
            return $next($request);
			
        });
    }
     public function index() {
      return view("backend/notice-new")->with("sel_menu", "notice");
   }
   public function store(Request $request) {
      $this->validate($request, [
          "title" => "required|max:250",
          "descr" => "required|min:20",
          "date" => "required"
      ]);
      $data = array(
          "title" => $_POST['title'],
          "description" => $_POST['descr'],
          "date" => $_POST['date']
      );
      
      $result = NoticeModel::Create($data);
      if($result){
         return redirect('/notice-management')->with('message', 'Save Successful');
      }
      else{
         echo "Some error occurs";
      }
   }
   public function view(Request $request) {
       //$request->session()->put("qid", array(10, 11, 20));
       
      /* $data = $request->session()->get("qid");       
       $data[] = 200;
       
       $dd = array(12, 13, 14, 16);
       
       $data = DB::table("student")->select("id")->whereNotIn("id", $dd)->inRandomOrder()->paginate(1);
       
       echo "<pre>";
       print_r($data);
       echo "</pre>";*/
       
         //$data = DB::table("notice")->where("id", $id)->paginate();
      $data = DB::table('notice')
                      ->select('notice.*')->paginate();

      
      return view("backend/notice-view")->with("allNotice", $data)->with("sel_menu", "notice");
        
   }
   public function edit($id) {
      $data = DB::table("notice")->where("id", $id)->paginate();
      return view("backend/notice-edit")->with("selNotice", $data);
   }
   public function update(Request $request){
      $data = array(
          "title" => $_POST['title'],
          "description" => $_POST['descr'],
          "date" => $_POST['date']
      );
      
      $result = DB::table("notice")->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/notice-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/notice-management/view')->with('message', 'Some error occurs');
      }
   }
   
   public function delete($id) {
      $result = DB::table("notice")->where("id", $id)->delete();
      if ($result) {
         return redirect('/notice-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/notice-management/view')->with('message', 'Some error occurs');
      }
   }
   public function publish($id) {
       $data = DB::table("notice")->where("id", $id)->paginate();
      return view("backend/notice-publish")->with("selNotice", $data);
}
}