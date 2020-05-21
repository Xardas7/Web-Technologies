<?php

namespace App\Http\Controllers;

use App\Card;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(30);
        return view('admin.ordersIndex', ['orders'=>$orders]);
    }

    public function indexByUser(){
        $user = Auth::user();
        $orders = $user->orders;
        foreach ($orders as $order){
            $order['address'] = $order->address;
            $order['products'] = $order->products;
        }

        return view('myorders', ['orders'=>$orders]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $shoppingCart = $user->shoppingCart->products;
        return view('checkout', ['shoppingCart' => $shoppingCart]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $cards = $user->cards;
        $chosenCard = null;

        foreach($cards as $card){
            if($card->card_number == $request->cardNumber AND $card->cvv == $request->cvvNumber){
                $chosenCard = $card;
            }
        }

        if($chosenCard == null) {
            $chosenCard = $user->cards()->create([
                'type' => $request->type,
                'card_number' => $request->cardNumber,
                'name' => $request->name,
                'surname' => $request->surname,
                'exp_date' => $request->exp_date,
                'cvv' => $request->cvv
            ]);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $request->address_id,
            'coupon_id' => $request->coupon_id,
            'card_id' => $chosenCard->id,
            'amount' => $request->amount
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('orderShow', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('editOrder', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
