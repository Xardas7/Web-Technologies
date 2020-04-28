<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('category');
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        return view('single', ['product'=>$product]);
    }

    
}
