<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('user.address.create');
    }

    public function store(Request $request){


        $validate = $request->validate([
            'country' => 'string',
            'city' => 'string',
            'address' => 'string',
            'address_additional' => 'nullable|string',
            'postal_code' => 'integer',
            'type' => 'in:billing,delivery,both',
        ]);

        $user = Auth::user();
        $address = $user->addresses()->create([
        'country' => $request->country,
        'city' => $request->city,
        'address' => $request->address,
        'address_additional' => $request->address_additional,
        'postal_code' => $request->postal_code,
        'type' => $request->type
        ]);
        if($request->default){
            $user->default_address = $address->id;
            $user->save();
        }

        alert()->success('Address','The address has been added')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
        return redirect()->route('user.settings');

        }

    public function edit($id){
        $user = Auth::user();
        $address = Address::find($id);

        if($user->id != $address->user->id){
            return "This is not your address";
        } else {
            return view('user.address.edit',[
                'address' => $address
            ]);
        }

    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'country' => 'string',
            'city' => 'string',
            'address' => 'string',
            'address_additional' => 'nullable|string',
            'postal_code' => 'integer',
            'type' => 'in:billing,delivery,both',
        ]);

        $user = Auth::user();
        $address = Address::find($id);

        if($user->id != $address->user->id){
            return "This is not your address";
        }

        $input = $request->all();
        $address->update($input);
        if($request->default){
            $user->default_address = $address->id;
            $user->save();
        }
        alert()->success('Address','Address Updated')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
            return redirect(route('user.settings'));

    }

    public function delete($id){
        $address = Address::find($id);
        if(Auth::id() != $address->user->id){
            return back()->withErrors([
                'notOwner' => 'This address does not belongs to you'
            ]);
        }
        $address->delete();
    }

    public function store_from_checkout(Request $request){
        $a = new AddressController();
        $data = $a->store($request);
        $cards = Auth::user()->cards;
        $products=Auth::user()->shoppingCart->products;
        return redirect('/payments');
    }

}
