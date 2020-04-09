<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ProductModel;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductController extends Controller {

   public function index() {
      $data = CategoryModel::all();
      return view("backend/product-new")->with("allCat", $data);
   }

   public function store(Request $request) {
      $this->validate($request, [
          "title" => "required|max:50",
          "descr" => "required|max:200",
          "price" => "required|integer|max:20",
          "vat" => "numeric"
      ]);
      $data = array(
          "title" => $_POST['title'],
          "description" => $_POST['descr'],
          "price" => $_POST['price'],
          "vat" => $_POST['vat'],
          "discount"=> $_POST['discount'],
          "categoryid" => $_POST['catid']
      );
      
      $result = ProductModel::Create($data);
      if($result){
         return redirect('/product-management')->with('message', 'Save Successful');
      }
      else{
         echo "Some error occurs";
      }
      
   }

}
