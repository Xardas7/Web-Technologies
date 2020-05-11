<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\General\CollectionHelper;
use Illuminate\Http\Request;
use App\Product;
use Symfony\Component\Console\Input\Input;

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
        /*$input=request('color').request('type');

        if (empty($input)){
            return "niente";
        }
        else{
            return $input.' dall url';
        }
        */
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

    public function show($name)
    {
        $products = Product::all();
        $product = new Product();
        foreach ($products as $product1 ){
            if($product1->name == $name){
                $product=$product1;
                break;
            }
            }
        return view('single', compact('product'));
    }


}
