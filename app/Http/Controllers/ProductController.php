<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Helpers\General\SearchHelper;
use App\Helpers\General\MostSearchedHelper;
use App\Helpers\General\FilterHelper;
use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function index($gender){
        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->paginate($products);
        return view('category', compact('products'));
    }
    public function index_name($gender, $name)
    {
        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->search_by_name($name, $products);
        $products = $p->paginate($products);
        return view('category', compact('products'));
    }

    public function index_type($gender, $name, $type)
    {
        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->search_by_name($name, $products);
        $products = $p->search_by_type($type, $products);
        $products = $p->paginate($products);
        return view('category', compact('products'));
    }

    public function show($name)
    {
        $products = Product::all();
        $product = new Product();
        foreach ($products as $product1) {
            if ($product1->name == $name) {
                $product = $product1;
                break;
            }
        }
        if($product->name!=null) {
            $m = new MostSearchedHelper();
            $m->increment($product);
            return view('single', compact('product'));
        }
        else{
            abort(404);
        }
    }
}
