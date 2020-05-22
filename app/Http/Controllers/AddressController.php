<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function edit($id){
        $user = Auth::user();
        $address = Address::find($id);

        if($user->id != $address->user->id){
            return "This is not your address";
        } else {
            return view('user.address-edit',[
                'address' => $address
            ]);
        }

    }

    public function update(Request $request, $id){
        $user = Auth::user();
        $address = Address::find($id);

        if($user->id != $address->user->id){
            return "This is not your address";
        } else {
            $address->update($request->all());
            return redirect(route('user.settings'));
        }
    }
    
    public function store_from_checkout(Request $request){
        $a=new AddressController();
        $data = $a->store($request);
        return view('/checkout-payment',compact('data'));
    }

}
