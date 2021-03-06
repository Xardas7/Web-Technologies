<?php

namespace App\Http\Controllers;

use App\Address;
use App\Card;
use App\Coupon;
use App\Order;
use App\Product;
use App\OrdersHaveProduct;
use App\ShoppingCartsHaveProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

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
            'coupon_code' => 'string',
            'payment' => 'in:card,paypal,delivery'
        ]);

        $user = Auth::user();
        $coupon = null;
        $coupon_id = null;
        $coupon_code = $request->coupon_code;
        $coupon_value = $this->verify_coupon($coupon_code);
        $amount = $user->shoppingCart->amount;

        if($coupon_value['validity']=='valid') {
            $coupon = Coupon::where('code',$coupon_code)->first();
            $coupon_id = $coupon->id;
            $amount = $amount * $coupon->amount;
        }

        foreach($user->shoppingCart->products as $product){
            if($product->shoppingCartDetails->quantity > $product->details->quantity){
        alert()->error($product->name,'Quantity not available')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
        return redirect()->route('cart.show');
            }
        }

        $shipping_address = Address::find($user->shipping_address);
        if($request->payment == 'card' AND $request->card) {
            $order = Order::create([
                'user_id' => $user->id,
                'billing_address_id' => $user->billing_address,
                'shipping_address_id' => $user->shipping_address,
                'shipping_address' => $shipping_address->address.", ".$shipping_address->city.", ".$shipping_address->country,
                'coupon_id' => $coupon_id,
                'card_id' => $request->card,
                'amount' => $amount + 10,
                'state' => 'in progress'
            ]);

            foreach($user->shoppingCart->products as $product){
                $orderDetails = OrdersHaveProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_description' => $product->description,
                    'product_price' => $product->price,
                    'image_path' => $product->images->first()->path,
                    'quantity' => $product->shoppingCartDetails->quantity,
                    'size' => $product->shoppingCartDetails->size
                ]);
                $user->shoppingCart->products()->detach($product->id);
                $user->shoppingCart->amount = 0;
                $user->shoppingCart->save();
                $product_real = Product::find($product->id);
                $product_real->details->quantity -= $product->details->quantity;
                $product_real->details->save();
            }
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
        return redirect('/confermation/'.$order->id);
    }

    public function confermation($order_id){
        $order = Order::findOrFail($order_id);
        if($order->user_id != Auth::id()){
            $error='Oops, something went wrong!';
            return view('confermation', [
                'error' => $error
            ]);
        }
        $order_details = OrdersHaveProduct::where('order_id',$order->id)->get();
        $shipping_details = Address::findOrFail($order->shipping_address_id);
        $billing_details = Address::findOrFail($order->billing_address_id);

        return view('confermation', [
            'order' => $order,
            'order_details' => $order_details,
            'shipping_address' => $shipping_details,
            'billing_address' => $billing_details,
            'error' => $error = null]);
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

    public function payment_checkout(Request $request){
        $shipping_address = Address::find($request->shipping_address);
        $billing_address = Address::find($request->billing_address);

        $user = Auth::user();
        $user->shipping_address = $shipping_address->id;
        $user->billing_address = $billing_address->id;
        $user->save();

        $discount_value = null;
        $coupon_code = null;
        $cards = Auth::user()->cards;
        $products=Auth::user()->shoppingCart->products;
        return view('checkout-payment', ['cards'=> $cards, 'products' => $products, 'discount_value' => $discount_value, 'coupon'=>$coupon_code]);
    }

    public function payment_checkout_with_coupon(Request $request){
        $discount_value = null;
        $discount = $this->verify_coupon($request->coupon);
        if($discount['validity'] == 'valid'){
            $discount_value = $discount['discount'];
        }
        $cards = Auth::user()->cards;
        $products=Auth::user()->shoppingCart->products;
        return view('checkout-payment', ['cards'=> $cards, 'products' => $products, 'discount_value' => $discount_value/100, 'coupon'=>$request->coupon]);
    }

    public function verify_coupon($coupon_code){
        $coupon = Coupon::where('code', $coupon_code)->first();
        $validity = false;
        $discount = null;
        if($coupon){
            if($coupon->exp_date > Carbon::now()) {
                $validity = 'valid';
                $discount = $coupon->amount;
            } else {
                $validity = 'expired';
            }
        } else {
            $validity = 'invalid';
        }
        return ['validity' => $validity, 'discount' => $discount];
    }

    public function checkout(){
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('checkout', ['user'=>$user, 'addresses'=>$addresses]);
    }
}
