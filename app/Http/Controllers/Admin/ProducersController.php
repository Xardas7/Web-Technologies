<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('code') != null) {
            $key = request('code');
            $key = Producer::where('code', $key)->first()->id;
            $producers=Producer::where('user_id',$key)->get();
            return view('admin.forms.other.coupons', compact('producers'));
        } else {
            $producers=Producer::all();
            return view('admin.forms.other.producers.index', compact('producers'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.other.producers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a=$request->amount;
        $b=$request->quantity;
        if (is_numeric($a)) {
            if (is_numeric($b)){
            $coupon = new Coupon();
            $coupon->code = $request['code'];
            $coupon->amount = $request['amount'];
            $coupon->exp_date = $request['exp_date'];
            $coupon->quantity = $request['quantity'];
            $coupon->save();
            return redirect()->route('admin.producer.index')->with('success', 'Coupon ' . $request->code . ' added successfully!');
        } }else {
            $emailErr = "Invalid format";
            return \Redirect::back()->withErrors([$emailErr]);
        }
    }
    protected function edit($id)
    {
        $coupon= Coupon::findOrFail($id);
        return view('admin.forms.other.coupons.edit',compact('coupon'));

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
        $a=$request->amount;
        $b=$request->quantity;
        if (is_numeric($a)) {
            if (is_numeric($b)){
                $coupon = Coupon::findOrFail($request['id']);
                $coupon->code = $request['code'];
                $coupon->amount = $request['amount'];
                $coupon->exp_date = $request['exp_date'];
                $coupon->quantity = $request['quantity'];
                $coupon->updated_at=date('Y-m-d');
                $coupon->save();
                return redirect()->route('admin.coupon.index')->with('success', 'Coupon ' . $request->code . ' updated successfully!');
            } }else {
            $emailErr = "Invalid format";
            return \Redirect::back()->withErrors([$emailErr]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $producer=Producer::findOrFail($request->id);
        $producer->delete();
        return back()->with('success', 'producer deleted!');
    }



}
