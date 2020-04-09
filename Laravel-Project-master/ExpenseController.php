<?php

namespace App\Http\Controllers;

use App\ExpenseModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\BankModel;

class ExpenseController extends Controller {
	public function __construct() {
        $this->middleware(function ($request, $next) {
            $type = $request->session()->get("mytype");
            if ($type != 'a') {
                return redirect('/');
            }
            return $next($request);
        });
    }
    public function index() {
        return view("backend/expense-new")->with("sel_menu", "expense");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required|max:50",
            "descr" => "required|max:200",
            "amount" => "required|integer|max:100000",
            "date" => "required"
        ]);
        $data = array(
            "name" => $_POST['name'],
            "description" => $_POST['descr'],
            "amount" => $_POST['amount'],
            "date" => $_POST['date']
        );

        $result = ExpenseModel::Create($data);
        if ($result) {
            $data = array(
                "account_head" => "Expense",
                "debit" => $_POST['amount'],
                "credit" => 0,
                "remarks" => "Description :{$_POST['name']}",
                "date" => date("Y-m-d")
            );
            BankModel::create($data);
            return redirect('/expense-management')->with('message', 'Save Successful');
        } else {
            echo "Some error occurs";
        }
    }

    public function view() {
        $data = DB::table('expense')
                        ->select('expense.*')->paginate();


        return view("backend/expense-view")->with("allExp", $data)->with("sel_menu", "expense");
    }

    public function edit($id) {
        $data = DB::table("expense")->where("id", $id)->paginate();
        return view("backend/expense-edit")->with("selExp", $data);
    }

    public function update(Request $request) {
        $data = array(
            "name" => $_POST['name'],
            "description" => $_POST['descr'],
            "amount" => $_POST['amount'],
            "date" => date("Y-m-d")
        );

        $result = DB::table("expense")->where("id", $_POST['id'])->update($data);
        if ($result) {
            return redirect('/expense-management/view')->with('message', 'Update Successful');
        } else {
            return redirect('/expense-management/view')->with('message', 'Some error occurs');
        }
    }

    public function delete($id) {
        $result = DB::table("expense")->where("id", $id)->delete();
        if ($result) {
            return redirect('/expense-management/view')->with('message', 'Delete Successful');
        } else {
            return redirect('/expense-management/view')->with('message', 'Some error occurs');
        }
    }

}
