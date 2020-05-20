<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request){
        $user_id = Auth::id();

            $address = Address::create([
                'user_id' => $user_id,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'address_additional' => $request->address_additional,
                'postal_code' => $request->postal_code,
                'type' => 'both'
            ]);
        return $address;
        }
    public function store_from_checkout(Request $request){
        $a=new AddressController();
        $data = $a->store($request);
        return view('/checkout-payment',compact('data'));
    }

}
