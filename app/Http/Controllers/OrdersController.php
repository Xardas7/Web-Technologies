<?php

namespace App\Http\Controllers;

use App\Address;
use App\Card;
use App\Order;
use App\Product;
use App\OrdersHaveProduct;
use App\ShoppingCartsHaveProduct;
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


        $validate = $request->validate([
            'card' => 'integer',
            'coupon_id' => 'integer',
            'amount' => 'regex:/[0-9]+\.[0-9]*/i',
            'payment' => 'in:card,paypal,delivery'
        ]);


        $user = Auth::user();
//        $cards = $user->cards;
//        $chosenCard = null;
//
//        foreach($cards as $card){
//            if($card->card_number == $request->cardNumber AND $card->cvv == $request->cvvNumber){
//                $chosenCard = $card;
//            }
//        }
//
//        if($chosenCard == null) {
//            $chosenCard = $user->cards()->create([
//                'type' => $request->type,
//                'card_number' => $request->cardNumber,
//                'name' => $request->name,
//                'surname' => $request->surname,
//                'exp_date' => $request->exp_date,
//                'cvv' => $request->cvv
//            ]);
//        }
        $address_id = Address::where('user_id',$user->id)->first()->id;
        if($request->payment == 'card' AND $request->card) {
            $order = Order::create([
                'user_id' => $user->id,
                'billing_address_id' => $address_id,
                'shipping_address_id' => $address_id,
                'coupon_id' => $request->coupon_id,
                'card_id' => $request->card,
                'amount' => $request->amount,
                'state' => 'in progress'
            ]);

            foreach($user->shoppingCart->products as $product){
                $orderDetails = OrdersHaveProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->details->product_id,
                    'quantity' => $product->details->quantity,
                    'size' => $product->details->size
                ]);
                $user->shoppingCart->products()->detach($product->id);
                $product_real = Product::find($product->id);
                $product_real->details->quantity -= $product->details->quantity;
                $product_real->details->save();
            }

            $order_details = OrdersHaveProduct::where('order_id',$order->id)->get();
            //($order_details);
            $shipping_details = Address::find($order->shipping_address_id);
            $billing_details = Address::find($order->billing_address_id);
        } elseif($request->payment == 'paypal'){
            /**
             *
             * DA FARE*
             *
             */
        } elseif($request->payment == 'delivery'){
            /**
             *
             * DA FARE*
             *
             */
        }
        else redirect()->back()->with(['error' => 'Invalid Card']);
        return view('confermation', [  'order' => $order,
                                            'order_details' => $order_details,
                                            'shipping_address' => $shipping_details,
                                            'billing_address' => $billing_details]);
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

    public function payment_checkout(){
        $cards = Auth::user()->cards;
        $products=Auth::user()->shoppingCart->products;
        return view('checkout-payment', ['cards'=> $cards, 'products' => $products]);
    }

}
