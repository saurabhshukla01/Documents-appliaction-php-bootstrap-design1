<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Storage;
use URL;
use DB;
use Input;

class UserController extends Controller
{
    


    public function dropzone() {
        return view('dropzone');
    }



    public function document_upload(Request $request) {

        if($request->hasFile('file')){
            $file = $request->file('file');
            $completeFileName = $file->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $randomized = rand();
            $documents = str_replace(' ', '', $fileNameOnly).'-'.$randomized.''.time().'.'.$extension;
            $path = $file->storeAs('public/users', $documents);
            $test2 = $request->hasFile('file');
           
            $insert_doc = DB::table('users')->insert([
                    'documents' => $documents,
                ]);
        }
        echo $documents;
        die;
    }
}
