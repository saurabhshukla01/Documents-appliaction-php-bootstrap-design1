<?php

namespace App\Http\Controllers;

use App\BankModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class BankController extends Controller {

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
        return view("backend/bank");
    }
    
    public function report() {
        $data = DB::table("bank")                
                ->where("date", "<=", $_POST['edate'])
                ->get();
        
        echo "<pre>";
        print_r($data);
        echo "</pre>";
                
        //return view("backend/bank-report");
    }

}
