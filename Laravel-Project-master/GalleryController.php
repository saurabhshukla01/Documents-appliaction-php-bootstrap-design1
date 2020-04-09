<?php

namespace App\Http\Controllers;

use App\StudentModel;
use App\DepartmentModel;
use App\GalleryModel ;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller {

   public function index() {
    $data = GalleryModel::all();
     return view("backend/gallery")->with("allDpart", $data);
   }

   public function store(Request $request) {
      $this->validate($request, [
          "title" => "required|max:50",
          "date" => "required",
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
          "title" => $_POST['title'],
          "date" => $_POST['date'],  
          "picture" => $ext
      );
      $id = GalleryModel::create($data)->id;
      if ($id) {
         if ($ext != "") {
            $destinationPath = 'images/student';
            $file->move($destinationPath, "student-{$id}.{$ext}");
         }
         return redirect('/gallery-management')->with('message', 'Save Successful');
      } else {
         return redirect('/gallery-management')->with('message', 'Server too bussy');
      }
   }

 public function view() {
      $data = DB::table('gallery')
                      ->select('gallery.*')->paginate();

      /*
        echo "<pre>";
        print_r($data);
        echo "</pre>";
       * 
       */
     return view("backend/gallery-view")->with("allStd", $data);
  }

 public function edit($id) {
      $data1 = GalleryModel::all();
      $data = DB::table("gallery")->where("id", $id)->paginate();
      return view("backend/gallery-edit")->with("selStd", $data)->with("allDpart", $data1);
   }
   
   public function update(Request $request){
	    $id = $_POST['id'];
        $data1 = DB::table('gallery')->where("id", $id)->paginate();

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
          "title" => $_POST['title'],
          "date" => $_POST['date'],
		  "picture" => $ext
      );
      
      $result = DB::table('gallery')->where("id", $_POST['id'])->update($data);
      if ($result) {
         return redirect('/gallery-management/view')->with('message', 'Update Successful');
      } else {
         return redirect('/gallery-management/view')->with('message', 'Some error occurs');
      }
   }

   public function delete($id) {
      $result = DB::table("gallery")->where("id", $id)->delete();
      if ($result) {
         return redirect('/gallery-management/view')->with('message', 'Delete Successful');
      } else {
         return redirect('/gallery-management/view')->with('message', 'Some error occurs');
      }
   }

}
