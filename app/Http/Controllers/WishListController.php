<?php

namespace App\Http\Controllers;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function store($request){
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
}
