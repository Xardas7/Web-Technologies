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

        $validate = $request->validate([
            'product_id' => 'integer',
            'quantity' => 'integer',
            'size' => 'alpha_num',
        ]);

        //Estraggo le info dell'utente loggato
        $user = Auth::user();

        $product = Product::find($request->product_id);

        if($product->details == null){
            return response()->json([
                'message' => 'Product not available'
            ]);
        }

        if($product->details->quantity < $request->quantity){
            return response()->json([
                'message' => 'Quantity not available'
            ]);
        }


        $quantity = $request->quantity;
        $size = $request->size;
        $amount = $product->price * $quantity;

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
                ->where('product_id', $product->id)
                ->where('size',$size)
                ->first();

            if ($shoppingcarthasproducts) {
                //Se il prodotto è già presente, ne aumento solo la quantità
                $shoppingcarthasproducts->quantity = $quantity;
                $shoppingcarthasproducts->save();
            } else {
                //Altrimenti, lo inserisco
                $cart->products()->attach($product->id,[
                    'quantity' => $quantity,
                    'size' => $size
                ]);
            }
        $cart->amount += $amount;
        $cart->save();
    }


    public function refresh_quantity(Request $request){


        $validate = $request->validate([
            'product_id' => 'integer',
            'quantity' => 'integer'
        ]);

        $user = Auth::user();
        $product = Product::find($request->product_id);

        if($product->details->quantity < $request->quantity){
            return response()->json([
                'message' => 'Quantity not available'
            ]);
        } else {
           $user->shoppingCart->products()->updateExistingPivot($product->id,['quantity' => $request->quantity]);
           return response()->json([
               'available' => true
           ]);
        }


    }

    public function deleteProduct($id){

        $user = Auth::user();

        $user->shoppingCart->products()->where('product_id',$id)->delete();

    }


}
