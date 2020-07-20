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
        $display_name = null;
        $display_type = null;
        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender','male')->get();
                $category_name = 'Menswear';
            break;
            case 'womens':
                $categories = Category::where('gender','female')->get();
                $category_name = 'Women\'s shoes, fashion & accessories';
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
        $producers = collect();
        foreach($products as $product){
            $producers->push($product->producer);
        }
        $products = $p->paginate($products);
        $error = null;
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'error' => $error,
            'producers' => $producers,
            'category_name' => $category_name,
            'display_name' => $display_name,
            'display_type' => $display_type
        ]);
    }

    public function index_name($gender, $name)
    {
        $category_name = null;
        $display_name = null;
        $display_type = null;
        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender', 'male')->get();
                $category_name = 'Men\'s';
                $display_name = $category_name . ' ' . ucfirst($name);
                break;
            case 'womens':
                $categories = Category::where('gender', 'female')->get();
                $category_name = 'Women\'s';
                $display_name = $category_name . ' ' . ucfirst($name);
                break;
            default:
                $categories = Category::distinct()->get();
                $category_name = 'All';
                $display_name = $category_name . ' ' . ucfirst($name);
        }

        $category_name .= ' '.ucwords($name);

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
        $producers = collect();
        foreach($products as $product){
            $producers->push($product->producer);
        }
        $products = $p->paginate($products);
        $error = null;
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'producers' => $producers,
            'error' => $error,
            'category_name' => $category_name,
            'display_name' => $display_name,
            'display_type' => $display_type
        ]);
    }

    public function index_type($gender, $name, $type)
    {
        $display_type = ucwords($type);

        switch ($gender) {
            case 'mens':
                $categories = Category::where('gender','male')->get();
                $category_name = 'Men\'s';
                $display_name = $category_name.' '.ucfirst($name);
                $display_link = '/mens-clothing/'.$name;
                break;
            case 'womens':
                $categories = Category::where('gender','female')->get();
                $category_name = 'Women\'s';
                $display_name = $category_name.' '.ucfirst($name);
                $display_link = '/womens-clothing/'.$name;
                break;
            default:
                $categories = Category::distinct()->get();
                $category_name = 'All';
                $display_name = $category_name.' '.ucfirst($name);
                $display_link = '/all-clothing/'.$name;
        }

        $category_name .= ' '.ucwords($type);

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
        $producers = collect();
        foreach($products as $product){
            $producers->push($product->producer);
        }
        $products = $p->paginate($products);
        $error = null;
        if(count($products) == 0){ $error = 'There\'s nothing here';}
        return view('category', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'producers' => $producers,
            'error' => $error,
            'category_name' => $category_name,
            'display_name' => $display_name,
            'display_type' => $display_type,
            'display_link' => $display_link
        ]);
    }

    public function show($name)
    {
        $product = Product::where('name',$name)->first();
        if(!$product){abort(404);}
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

    public function search(Request $request){
        $query = $request->input('query');
        $error = null;

        $macro_categories= Category::all()->unique('name');

        $categories = Category::distinct()->get();

        foreach($categories as $category){
            $category['count'] = count($category->products);
            if($category->gender == 'male'){
                $category['gender'] == 'Men';
            } else $category['gender'] == 'Women';
        }

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
        $products = Product::where('name','LIKE','%'.$query.'%')->get();
        $products = $p->paginate($products);
        $producers = collect();
        foreach($products as $product){
            $producers->push($product->producer);
        }
        if($products->isEmpty()){
            $error = "There's nothing here!";
        }
        return view('search', [
            'products' => $products,
            'macro_categories' => $macro_categories,
            'error' => $error,
            'producers' => $producers,
            'search_term' => $query
        ]);
    }
}
