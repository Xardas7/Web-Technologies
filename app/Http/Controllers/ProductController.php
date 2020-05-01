<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index($category)
    {

        $category_obj = Category::findOrFail($category);
        $products = $category_obj->products;
        return view('category', compact('products'));
        /*
              if( ($category_obj = Category::where('name',$category)->get())!= null ){
               return $category_obj;
               /*    $products = $category_obj->products;
                   return view('category', compact('products'));
               }
               if (($category_obj = Category::where('gender',$category)->get())!= null){
                   $products = $category_obj->products;
                   return view('category', compact('products'));
               }
               if (($category_obj = Category::where('type',$category)->get())!= null){
                   $products = $category_obj->products;
                   return view('category', compact('products'));
               }
               else{
                   abort(404);
               }
*/
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        //return$product->comments->content;
        return view('single', compact('product'));
    }


}
