<?php


namespace App\Helpers\General;

use App\Product;


class SearchHelper
{
    public function search_by_gender($gender)
    {
        $g = new GenderHelper();
        $gender=$g->transform($gender);

        if ($gender == 'all') {
            $products = Product::all();
        } else {
            $products_col = Product::all();
            $products = collect();
            foreach ($products_col as $product_obj) {
                if ($product_obj->category->gender == $gender) {
                    $products->push($product_obj);
                }
            }
        }
        return $products;
    }


    function search_by_name($name, $products)
    {
        $products_all = collect();
        foreach ($products as $product_obj) {
            if ($product_obj->category->name == $name) {
                $products_all->push($product_obj);
            }
        }
        return $products_all;
    }

    function search_by_type($type, $products)
    {
        $products_all = collect();
        foreach ($products as $product_obj) {
            if ($product_obj->category->type == $type) {
                $products_all->push($product_obj);
            }
        }
        return $products_all;
    }
    function paginate($products)
    {
        $f=new FilterHelper();

        $products=$f->filter($products);

        $total = $products->count();
        $products = CollectionHelper::paginate($products, $total, 12);
        return $products;
    }
}
