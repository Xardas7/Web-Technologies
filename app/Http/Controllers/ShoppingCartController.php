<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\ShoppingCartsHaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function store(Request $request){
        //Estraggo le info dell'utente loggato
        $user = Auth::user();
        //Estraggo le info del carrello dell'utente loggato
        $cart = ShoppingCart::where('user_id',$user->id)->first();
        //Controllo se nel carrello dell'utente quel prodotto è già presente
        $shoppingcarthasproducts = ShoppingCartsHaveProduct::where('shoppingcart_id',$cart->id)
                                    ->where('product_id',$request->product_id)
                                    ->first();

        if($shoppingcarthasproducts){
            //Se il prodotto è già presente, ne aumento solo la quantità
            $shoppingcarthasproducts->quantity += $request->quantity;
            $shoppingcarthasproducts->save();

        } else {
            //Altrimenti, lo inserisco
            $shopping = new ShoppingCartsHaveProduct;
            $shopping->shoppingcart_id = $cart->id;
            $shopping->product_id = $request->product_id;
            $shopping->quantity = $request->quantity;
            $shopping->save();
        }
    }
}
