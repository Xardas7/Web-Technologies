<?php


namespace App\Helpers\General;


use Illuminate\Container\Container;
use App\Product;


class FilterHelper
{
    public function filter($products){
        $brand = request('brand');
        $max_price = request('max_price');
        $min_price = request('min_price');
        if (!empty($brand)) {
            $products_all = collect();
            foreach ($products as $product_obj) {
                if ($product_obj->producer->name == $brand) {

                    $products_all->push($product_obj);
                }
            }
            $products = $products_all;
        }
        if (!empty($min_price)) {
            $products_all = collect();
            foreach ($products as $product_obj) {
                if ($product_obj->price >= $min_price) {

                    $products_all->push($product_obj);
                }
            }
            $products = $products_all;
        }
        if (!empty($max_price)) {
            $products_all = collect();
            foreach ($products as $product_obj) {
                if ($product_obj->price <= $max_price) {

                    $products_all->push($product_obj);
                }
            }
            $products = $products_all;
        }
        return $products;
    }
}
