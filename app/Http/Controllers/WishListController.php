<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

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
        $user_id = Auth::user()->id;
        $products = collect();
        $wishes = WishList::where('user_id',$user_id)->get();
        foreach ($wishes as $wish){
        $products->push(Product::find($wish->product_id));
        }
     return view('wishlist',compact('products'));
    }
}
