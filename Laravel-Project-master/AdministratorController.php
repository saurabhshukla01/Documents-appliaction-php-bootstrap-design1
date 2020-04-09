<?php

namespace App\Http\Controllers;

use DB;
use App\AdministratorModel;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdministratorController extends Controller {

    public function index() {

        return view("backend/administrator-new");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required|max:50",
            "email" => "required|max:50",
            "pass" => "required",
            "tp" => "required"
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
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "type" => $_POST['tp'],
			"picture" => $ext
        );
        $id = AdministratorModel::create($data)->id;
        if ($id) {
            if ($ext != "") {
                $destinationPath = 'images/administrator';
                $file->move($destinationPath, "administrator-{$id}.{$ext}");
            }
            return redirect('/administrator-management')->with('message', 'Save Successful');
        } else {
            echo "Some error occurs";
        }
    }

    public function view() {
        $data = DB::table('administrator')
                        ->select('administrator.*')->paginate();
        /*  echo '<pre>';
          print_r($data);
          echo '</pre>';
         * 
         */
        return view('backend/administrator-view')->with("allAtd", $data);
    }

    public function edit($id) {

        $data = DB::table("administrator")->where("id", $id)->paginate();
        return view("backend/administrator-edit")->with("alAd", $data);
    }

    public function update(Request $request) {
        $id = $_POST['id'];
        
        $data = DB::table("administrator")->where("id", $id)->paginate();
        foreach ($data as $value) {
            $old_ext = $value->picture;
        }

        $file = $request->file("pic");
        $ext = "";
        if ($file) {
            $ext = strtolower($file->getClientOriginalExtension());
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/administrator/administrator-{$id}.{$old_ext}")) {
                    unlink(("images/administrator/administrator-{$id}.{$old_ext}"));
                }
                $destinationPath = 'images/administrator';
                $file->move($destinationPath, "administrator-{$id}.{$ext}");
                $request->session()->put("mypicture", $ext);
            }
        } else {
            $ext = $old_ext;
        }
        $data = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['pass'],
            "type" => $_POST['tp'],
            "picture" => $ext
        );

        $result = DB::table("administrator")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/administrator-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/administrator-management/view')->with('message', 'Some error occurs');
        }
    }

    public function delete($id) {
        $result = DB::table("administrator")->where("id", $id)->delete();
        if ($result) {
            return redirect('/administrator-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/administrator-management/view')->with('message', 'Some error occurs');
        }
    }

}
