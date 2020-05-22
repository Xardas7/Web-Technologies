<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //-- Orders --//

    public function orders(){

        $user = Auth::user();
        $orders = $user->orders;
        foreach ($orders as $order){
            $order['address'] = $order->address;
            $order['products'] = $order->products;
        }
        return view('myorders', ['orders'=>$orders]);
    }

    public function settings(){
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('user.settings',compact('user','addresses'));
    }

}
