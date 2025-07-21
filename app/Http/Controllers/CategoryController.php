<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
 public   function MainPage() {
    Session::put('date','2025-7-15');

    $categories =Category::all();
    return view('welcome',['categories'=>$categories]);
}

public function GetCategoryProduct($catid=null) {
if ($catid) {
     $product=Product::where('category_id',$catid)->get();
    return view('product',['products'=>$product]);
}
else {
         $product=Product::paginate(10);

      return view('product',['products'=>$product]);

}



}


public function GetAllCategorywithProduct() {
    $categories=Category::all();
    $product=Product::all();
    return view('category',['products'=>$product,'categories'=>$categories]);
}

}
