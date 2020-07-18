<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\General\CollectionHelper;
use App\Helpers\General\SearchHelper;
use App\Helpers\General\MostSearchedHelper;
use App\Helpers\General\FilterHelper;
use App\Producer;
use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function index($gender){
        $category_name = null;
        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender','male')->get();
                $category_name = 'Men Products';
            break;
            case 'womens':
                $categories = Category::where('gender','female')->get();
                $category_name = 'Women Products';
            break;
            default:
                $categories = Category::distinct()->get();
                $category_name = 'All Products';
        }

        foreach($categories as $category){
            $category['count'] = count($category->products);
            if($category->gender == 'male'){
                $category['gender'] == 'Men';
            } else $category['gender'] == 'Women';
        }

        $macro_categories= Category::all()->unique('name');

        foreach($macro_categories as $macro_category){
            $counter = 0;
            $sub_categories = array();
                foreach($categories as $category){
                    if($category->name == $macro_category->name){
                        $sub_categories[] = $category;
                        $counter += $category->count;
                    }
                $macro_category['count'] = $counter;
                $macro_category['sub_categories'] = $sub_categories;
            }
        }

        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->paginate($products);
        $error = null;
        $producers = Producer::all();
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'error' => $error,
            'producers' => $producers,
            'category_name' => $category_name
        ]);
    }

    public function index_name($gender, $name)
    {
        $category_name = null;
        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender','male')->get();
                $category_name = 'Men';
                break;
            case 'womens':
                $categories = Category::where('gender','female')->get();
                $category_name = 'Women';
                break;
            default:
                $categories = Category::distinct()->get();
                $category_name = 'All';
        }

        $category_name .= ' '.ucfirst($name);

        foreach($categories as $category){
            $category['count'] = count($category->products);
            if($category->gender == 'male'){
                $category['gender'] == 'Men';
            } else $category['gender'] == 'Women';
        }

        $macro_categories= Category::all()->unique('name');

        foreach($macro_categories as $macro_category){
            $counter = 0;
            $sub_categories = array();
            foreach($categories as $category){
                if($category->name == $macro_category->name){
                    $sub_categories[] = $category;
                    $counter += $category->count;
                }
                $macro_category['count'] = $counter;
                $macro_category['sub_categories'] = $sub_categories;
            }
        }

        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->search_by_name($name, $products);
        $products = $p->paginate($products);
        $error = null;
        $producers = Producer::all();
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'producers' => $producers,
            'error' => $error,
            'category_name' => $category_name
        ]);
    }

    public function index_type($gender, $name, $type)
    {
        $category_name = null;
        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender','male')->get();
                $category_name = 'Men';
                break;
            case 'womens':
                $categories = Category::where('gender','female')->get();
                $category_name = 'Women';
                break;
            default:
                $categories = Category::distinct()->get();
                $category_name = 'All';
        }

        $category_name .= ' '.ucfirst($type);

        foreach($categories as $category){
            $category['count'] = count($category->products);
            if($category->gender == 'male'){
                $category['gender'] == 'Men';
            } else $category['gender'] == 'Women';
        }
        $macro_categories= Category::all()->unique('name');

        foreach($macro_categories as $macro_category){
            $counter = 0;
            $sub_categories = array();
            foreach($categories as $category){
                if($category->name == $macro_category->name){
                    $sub_categories[] = $category;
                    $counter += $category->count;
                }
                $macro_category['count'] = $counter;
                $macro_category['sub_categories'] = $sub_categories;
            }
        }

        $p = new SearchHelper();
        $products = $p->search_by_gender($gender);
        $products = $p->search_by_name($name, $products);
        $products = $p->search_by_type($type, $products);
        $products = $p->paginate($products);
        $error = null;
        $producers = Producer::all();
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'producers' => $producers,
            'error' => $error,
            'category_name' => $category_name
        ]);
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
        $sizes = $product->category->sizes;
        if($product->name!=null) {
            $m = new MostSearchedHelper();
            $m->increment($product);
            return view('single', ['product' => $product, 'sizes' => $sizes]);
        }
        else{
            abort(404);
        }
    }
}
