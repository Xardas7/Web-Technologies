<?php


namespace App\Helpers\General;

use App\MostSearchedProducts;

class MostSearchedHelper
{
    public function increment($product)
    {
        //update di most searched
        //da qui controllo se e' stato gia cercato
        $most_searched_products = MostSearchedProducts::all();
        $most_searched_product = new MostSearchedProducts();
        foreach ($most_searched_products as $most_searched_product1) {
            if ($most_searched_product1->product_id == $product->id) {
                $most_searched_product = $most_searched_product1;
                break;
            }
        }
//se non e' stato mai cercato ne crea uno
        if ($most_searched_product->id == null) {
            $most_searched_product->product_id = $product->id;
            $most_searched_product->count = 1;
            $most_searched_product->save();
        } //se è stato trovato aumenta count
        else {
            $most_searched_product->count = ($most_searched_product->count + 1);
            $most_searched_product->save();
        }
    }
}
