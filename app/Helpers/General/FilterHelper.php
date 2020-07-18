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
        $order_by = request('order_by');
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
        if (!empty($order_by)) {
            if ($order_by == 'asc') {
                $products = $products->sortBy('price');
            }
            if ($order_by == 'desc') {
                $products = $products->sortByDesc('price');
            }
            if ($order_by == 'date') {
                $products = $products->sortByDesc('created_at');
            }
        }
        return $products;
    }
}
