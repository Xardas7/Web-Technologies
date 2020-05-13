<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\General\CollectionHelper;
use App\MostSearchedProducts;
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
        elseif ($gender=='all'){
            $gender='female';
        }
        else{
            abort(404,'no category found');
        }
        if($gender='all'){
            $products=Product::all();
        }
        else {
            $products_col = Product::all();
            $products = collect();
            foreach ($products_col as $product_obj) {
                if ($product_obj->category->gender == $gender) {
                    $products->push($product_obj);
                }
            }
        }
        $name=request('name');
        $type=request('type');
        $brand=request('brand');
        $color=request('color');
        $max_price=request('max_price');
        $min_price=request('min_price');
    if (!empty($name)) {
        $products_all=collect();
        foreach ($products as $product_obj){
            if ($product_obj->category->name === $name) {

                $products_all->push($product_obj);
            }
        }
        $products=$products_all;
    }
        if (!empty($type)) {
            $products_all=collect();
            foreach ($products as $product_obj){
                if ($product_obj->category->type === $type) {

                    $products_all->push($product_obj);
                }
            }
            $products=$products_all;
        }
        if (!empty($brand)) {
            $products_all=collect();
            foreach ($products as $product_obj){
                if ($product_obj->category->brand === $brand) {

                    $products_all->push($product_obj);
                }
            }
            $products=$products_all;
        }/*
        if (!empty($color)) {
            $products_all=collect();
            foreach ($products as $product_obj){
                if ($product_obj->category->name === $name) {

                    $products_all->push($product_obj);
                }
            }
            $products=$products_all;
        }
        if (!empty($max_price)) {
            $products_all=collect();
            foreach ($products as $product_obj){
                if ($product_obj->category->name === $name) {

                    $products_all->push($product_obj);
                }
            }
            $products=$products_all;
        }
        if (!empty($min_price)) {
            $products_all=collect();
            foreach ($products as $product_obj){
                if ($product_obj->category->name === $name) {

                    $products_all->push($product_obj);
                }
            }
            $products=$products_all;
        }
*/
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

        //update di most searched
        //da qui controllo se e' stato gia cercato
        $most_searched_products = MostSearchedProducts::all();
        $most_searched_product = new MostSearchedProducts();
        foreach ($most_searched_products as $most_searched_product1){
            if($most_searched_product1->product_id == $product->id){
                $most_searched_product=$most_searched_product1;
                break;
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
