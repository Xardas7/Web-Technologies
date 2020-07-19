<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
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
        if (request('code') != null) {
            $key = request('code');
            $key = Coupon::where('code', $key)->first()->id;
            $coupons=Coupon::where('user_id',$key)->get();
            return view('admin.forms.other.coupons', compact('coupons'));
        } else {
            $coupons=Coupon::all();
            return view('admin.forms.other.coupons.index', compact('coupons'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.other.coupons.create');
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
            return redirect()->route('admin.coupon.index')->with('success', 'Coupon ' . $request->code . ' added successfully!');
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
        $coupon=Coupon::findOrFail($request->id);
        $coupon->delete();
        return back()->with('success', 'Coupon deleted!');
    }



}
