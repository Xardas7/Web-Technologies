<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\General\CollectionHelper;
use Illuminate\Http\Request;
use App\Product;
use App\MostSearchedProducts;
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
        // trovare un prodotto dato suo codice, altro metodo non fuznionava dovevo arrangiarmi cosi
        $products = Product::all();
        $product = new Product();
        foreach ($products as $product1 ){
            if($product1->name == $name){
                $product=$product1;
                break;
            }
            }
        //update di most searched
        //da qui controllo se e' stato gia cercato
        $most_searched_products = MostSearchedProducts::all();
        $most_searched_product = new MostSearchedProducts();
        foreach ($most_searched_products as $most_searched_product1){
            if($most_searched_product1->product_id == $product->id){
                $most_searched_product=$most_searched_product1;
            }
        }
        //se non e' stato mai cercato ne crea uno
        if($most_searched_product->id == null){
            $most_searched_product->product_id=$product->id;
            $most_searched_product->count=1;
            $most_searched_product->save();
        }
        //se è stato trovato aumenta count
        else{
            $most_searched_product->count=($most_searched_product->count+1);
            $most_searched_product->save();
        }
        return view('single', compact('product'));
    }


}
