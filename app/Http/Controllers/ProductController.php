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
        //return view('category');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        //return$product->comments->content;
        return view('single', compact('product'));
    }


}
