<?php

namespace App\Http\Controllers;

use App\OrdersHaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Address;
Use Alert;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id){

        $user = Auth::user();

        if($request->email != $user->email){
          $validate = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'birth_date' => 'required|date_format:Y-m-d',
            'email' => 'required|email|unique:users',
            'sex' => 'required|in:male,female,undefined'
        ]);  
        } else {
            $validate = $request->validate([
                'name' => 'required|string',
                'surname' => 'required|string',
                'birth_date' => 'required|date_format:Y-m-d',
                'email' => 'required|email',
                'sex' => 'required|in:male,female,undefined'
            ]); 
        }

        

        if($user->id != $id){
        alert()->error('Error','This is not your account!')
        ->animation('animate__bounce','animate__hinge')
        ->autoClose(3000)
        ->timerProgressBar();
            return back();
        }

        $user->update($request->all());

        alert()->success('Profile updated','Your profile has been updated')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();

        return redirect()->back();
    }


    public function settings(){
        $user = Auth::user();
        $addresses = $user->addresses;
        $cards = $user->cards;
        foreach($cards as $card){
            $number = $card->card_number;
            $card->card_number = substr($number,strlen($number)-4);
            $exp = $card->exp_date;
            $card->exp_date = substr($exp, 0, strlen($exp)-3);
        }

        $billing_address = Address::where('type','!=','delivery')
                                    ->where('user_id',$user->id)
                                    ->first();

        if($billing_address){
            $address_owner = $billing_address->user;
            return view('user.settings',compact('user','addresses','cards','billing_address','address_owner'));
        }

        return view('user.settings',compact('user','addresses','cards'));
     }
    //-- Orders --//

    public function orders(){

        $user = Auth::user();
        $orders = $user->orders;
        foreach ($orders as $order){
            $order['products'] = OrdersHaveProduct::where('order_id',$order->id)->get();
        }
       return view('myorders', ['orders'=>$orders]);
    }
}
