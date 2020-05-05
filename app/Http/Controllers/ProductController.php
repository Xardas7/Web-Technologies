<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\General\CollectionHelper;
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
        $products=collect();
        foreach ($products_col as $product_obj){
            if ($product_obj->category->gender == $gender) {
                $products->push($product_obj);
            }
    }
        $total=$products->count();
        $products = CollectionHelper::paginate($products, $total,12);
        return view('category',compact('products'));

    }

    public function show($product)
    {
        $product = Product::findOrFail($product);
        //return$product->comments->content;
        return view('single', compact('product'));
    }


}
