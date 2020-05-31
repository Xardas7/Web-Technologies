<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
Use Alert;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id){

        if(Auth::id() != $id){
            return back()->withErrors([
                'error' => 'This is not your account'
            ]);
        }

        $user = User::find($id);
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
        return view('user.settings',compact('user','addresses'));
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

}
