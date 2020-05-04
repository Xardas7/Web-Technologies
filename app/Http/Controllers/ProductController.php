<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index($gender)
    {
        if($gender=='mens'){
            $gender='male';
        }
        elseif ($gender=='womens'){
            $gender='female';
        }
        else{
          abort(404,'no category found');
        }
        // get all products where gender is male (for example)
        // get gender
        // get products
        // for each
         $products_col = Product::all();
        $products=Product::where('id',0)->get();
        foreach ($products_col as $product_obj){
            if ($product_obj->category->gender == $gender) {
                $products->push($product_obj);
            }
    }
            return view('category',compact('products'));

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        //return$product->comments->content;
        return view('single', compact('product'));
    }


}
