<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\Product;
use App\ShoppingCartsHaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexByUser(Request $request){
        //Estraggo le info dell'utente loggato
        $user = Auth::user();

        //Estraggo le info del carrello dell'utente loggato
        $cart = ShoppingCart::where('user_id',$user->id)->first();

        //Controllo che il carrello esista, se esiste
        if(!$cart) {
            //Se non esiste
            $cart = ShoppingCart::create([
                'user_id'=>$user->id
            ]);
        }

        $products = $user->shoppingCart->products;
        return view('cart',['products'=>$products]);
    }


    public function store(Request $request){
        //Estraggo le info dell'utente loggato
        $user = Auth::user();

        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $size = $request->size;

        //Estraggo le info del carrello dell'utente loggato
        $cart = ShoppingCart::where('user_id',$user->id)->first();

        //Controllo che il carrello esista, se esiste
        if(!$cart) {
            //Se non esiste
            $cart = ShoppingCart::create([
            'user_id'=>$user->id
            ]);
        }

            //Controllo se nel carrello dell'utente quel prodotto è già presente
            $shoppingcarthasproducts = ShoppingCartsHaveProduct::where('shoppingcart_id', $cart->id)
                ->where('product_id', $product_id)
                ->where('size',$size)
                ->first();

            if ($shoppingcarthasproducts) {
                //Se il prodotto è già presente, ne aumento solo la quantità
                $shoppingcarthasproducts->quantity += $quantity;
                $shoppingcarthasproducts->save();

            } else {
                //Altrimenti, lo inserisco
                $cart->products()->attach($product_id,[
                    'quantity' => $quantity,
                    'size' => $size
                ]);
            }
    }
}
