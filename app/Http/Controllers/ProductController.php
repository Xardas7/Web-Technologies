<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        return view('category');
    }

    public function show($id)
    {
        $product = Product::find($id);
       return $product->comments;
        // return view('single', ['product'=>$product]);
    }


}
