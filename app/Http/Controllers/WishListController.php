<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ShoppingCartsHaveProduct;

class WishListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $user_id = Auth::id();

        $wishlistSearch = WishList::where('user_id',$user_id)
                                    ->where('product_id',$request->product_id)
                                    ->first();

        if(!$wishlistSearch) {
            $wishlist = WishList::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id
            ]);
        }
    }

    public function index(){
        $user_id = Auth::user()->id;
        $products = collect();
        $wishes = WishList::where('user_id',$user_id)->get();
        foreach ($wishes as $wish){
        $products->push(Product::find($wish->product_id));
        }
     return view('wishlist',compact('products'));
    }

    public function delete($id){
        $user_id = Auth::id();
        $wish = WishList::where('user_id',$user_id)
                          ->where('product_id', $id);
        $wish->delete();

    }

    public function deleteAll(Request $request){

        $products_id = $request->products_id;
        $user_id = Auth::id();
        foreach($products_id as $product_id){

           $product = WishList::where('user_id',$user_id)
                    ->where('product_id',$product_id);

            $product->delete();

        }
    }

    public function addAll(Request $request){

        $user = Auth::user();
        $cart = $user->shoppingcart;
        $products_id = $request->products_id;
        foreach($products_id as $product_id){
            //Controllo se nel carrello dell'utente quel prodotto è già presente
            $shoppingcarthasproducts = ShoppingCartsHaveProduct::where('shoppingcart_id', $cart->id)
                ->where('product_id', $product_id)
                ->first();

            if ($shoppingcarthasproducts) {
                //Se il prodotto è già presente, ne aumento solo la quantità
                $shoppingcarthasproducts->quantity += 1;
                $shoppingcarthasproducts->save();
            } else {
                 $cart->products()->attach([
                     $product_id => ['quantity' => 1]
                 ]);
            }
        }

        // $products_id = $request->products_id;
        // $cart->products()->sync($products_id);

    }
}
