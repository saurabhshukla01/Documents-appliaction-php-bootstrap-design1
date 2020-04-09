<?php

namespace App\Http\Controllers;

use App\SalaryModel;
use App\StuffModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\TsalaryModel;

class SalaryController extends Controller {

    public function index() {
        return view("backend/salary");
    }

    public function store(Request $request) {
        $msg = "";
        if ($_POST['type'] == 1) {
            $ym = substr($_POST['date'], 0, 7);
            $allData = DB::table('teacher')
                    ->orderBy("name", "desc")
                    ->paginate();
            foreach ($allData as $value) {

                $salary = DB::table("tsalary")->select("*")->where("teacherid", $value->id)->where("date", "like", "{$ym}%")->get();

                if (!isset($salary[0])) {
                    $data = array(
                        "teacherid" => $value->id,
                        "date" => $_POST['date'],
                        "amount" => $_POST["sal_{$value->id}"]
                    );
                    $result = TsalaryModel::Create($data);
                } else {
                    $msg .= $value->name . " already taken";
                }
            }
        } else if ($_POST['type'] == 2) {
            $ym = substr($_POST['date'], 0, 7);

            $allData = DB::table('stuff')
                    ->orderBy("name", "desc")
                    ->paginate();
            foreach ($allData as $value) {

                $salary = DB::table("salary")->where("stuffid", $value->id)->where("date", "like", "{$ym}%")->get();

                if (!isset($salary[0])) {
                    $data = array(
                        "stuffid" => $value->id,
                        "date" => $_POST['date'],
                        "amount" => $_POST["sal_{$value->id}"]
                    );
                    $result = SalaryModel::Create($data)->with('message', 'Save Successful');
                    ;
                }
            }
        }
        if ($msg == "") {
            $msg = "Salary given to bank account";
        }
        return redirect('/salary-management')->with('message', $msg);
    }

    public function view() {
        $data = DB::table('salary')
                        ->join('stuff', 'salary.stuffid', '=', 'stuff.id')
                        ->select('salary.*', 'stuff.name as stname')->paginate();

        return view("backend/salary-view")->with("allStff", $data);
    }

    public function edit($id) {
        $data1 = StuffModel::all();
        $data = DB::table("salary")->where("id", $id)->paginate();
        return view("backend/salary-edit")->with("selStf", $data)->with("allStf", $data1);
    }

    public function update(Request $request) {
        $data = array(
            "stuffid" => $_POST['stfid'],
            "date" => $_POST['date'],
            "amount" => $_POST['amount']
        );
        $result = DB::table("salary")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/salary-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/salary-management/view')->with('message', 'Some error occurs');
        }
    }

    public function delete($id) {
        $result = DB::table("salary")->where("id", $id)->delete();
        if ($result) {
            return redirect('/salary-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/salary-management/view')->with('message', 'Some error occurs');
        }
    }

    public function loadingdata(Request $request) {

        if ($_GET['type'] == 1) {
            $allData = DB::table('teacher')
                    ->orderBy("name", "asc")
                    ->paginate();
        } else if ($_GET['type'] == 2) {
            $allData = DB::table('stuff')
                    ->orderBy("name", "desc")
                    ->paginate();
        }

        $data = "<div>";
        foreach ($allData as $value) {
            $data .= "<div>{$value->name}: </div>";
            $data .= "<div><p>Basic Salary : {$value->salary}</p> </div>";
            $data .= "<div> <input type='text' required name=\"sal_{$value->id}\"  \" /></div>";
        }
        $data .= "</div>";
        return $data;
    }

}
