<?php

namespace App\Http\Controllers\Admin;


use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    public function index()
    {
        if (request('email') != null) {
            $key = request('email');
            $key = Order::where('email', $key)->first()->id;
            $orders=Order::where('user_id',$key)->get();
            return view('admin.forms.orders.index', compact('orders'));
        } else {
            $orders=Order::all();
            return view('admin.forms.orders.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a= new MainController;
        $a->verify();
        return view('admin.forms.kick.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

    }

    public function products($id){
        $order = Order::find($id);
        $products = $order->products;
        return view('admin.forms.orders.products',compact('products'));


    }
}
