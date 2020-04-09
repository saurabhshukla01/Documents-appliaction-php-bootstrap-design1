<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {

    public function change_password(Request $request) {
        return view("backend/change-password");
      
    }

    public function profile(Request $request) {
        return view("backend/profile");
    }

    public function view(Request $request) {
        $data = DB::table('student')->select('*')->where("id", $request->session()->get("myid"))->paginate();
                
        $data1 = DB::table('administrator')->select('*')->where("id", $request->session()->get("myid"))->paginate();
        $data2 = DB::table('teacher')->select('*')->where("id", $request->session()->get("myid"))->paginate();
        return view('backend/profile')->with('allStudent', $data)->with('allAdmin', $data1)->with('allTeacher', $data2);
    }

    public function update(Request $request) {
        $id = $request->session()->get("myid");
        $type = $request->session()->get("mytype");

        if ($_POST['pass1'] != $_POST['pass2']) {
            return redirect('/change-password')->with('message', ' New or Retype password not match');
            
        } 
        else if ($type == 'a') {
            $data = DB::table("administrator")->where("id", $id)->where("password", $_POST['pass'])->get();

            if (isset($data[0])) {
                $dt = array("password" => $_POST['pass1']);
                $result = DB::table("administrator")->where("id", $id)->update($dt);
                  return redirect('/profile-management/view')->with('message', 'Save Successful');
            } else {
               return redirect('/change-password')->with('message', ' Current password not match');
            }
        } 
        else if ($type == 't') {
            $data = DB::table("teacher")->where("id", $id)->where("password", $_POST['pass'])->get();

            if (isset($data[0])) {
                $dt = array("password" => $_POST['pass1']);
                $result = DB::table("teacher")->where("id", $id)->update($dt);
                  return redirect('/profile-management/view')->with('message', 'Save Successful');
            } else {
               return redirect('/change-password')->with('message', ' Current password not match');
            }
        }
        else if ($type == 's') {
            $data = DB::table("student")->where("id", $id)->where("password", $_POST['pass'])->get();

            if (isset($data[0])) {
                $dt = array("password" => $_POST['pass1']);
                $result = DB::table("student")->where("id", $id)->update($dt);
                  return redirect('/profile-management/view')->with('message', 'Save Successful');
            } else {
               return redirect('/change-password')->with('message', ' Current password not match');
            }
        }
    }

}
