<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();

        $wishlistSearch = WishList::where('user_id',$user->id)->where('product_id',$request->product_id)->first();

        if(!$wishlistSearch) {
            $wishlist = WishList::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id
            ]);
        }

        return redirect()->back();
    }
    public function index(){
        $user = Auth::user();
        $whislist = WishList::where('user_id',$user->id)->first();
        if(!$whislist) {
            //Se non esiste
            $wishlist = WishList::create([
                'user_id'=>$user->id
            ]);
        }

        $products = $user->shoppingCart->products;

        return view('wishlist',compact('products'));
    }
}
