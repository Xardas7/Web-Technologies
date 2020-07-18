<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('email') != null) {
            $key = request('email');
            $key = User::where('email', $key)->first()->id;
            $addresses=Address::where('user_id',$key)->get();
            return view('admin.forms.address.index', compact('addresses'));
        } else {
            $addresses=Address::all();
            return view('admin.forms.address.index', compact('addresses'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::where('email',$request['email'])->first()->id;
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            return \Redirect::back()->withErrors([$emailErr]);
        }
        if (!User::where('email',$request->email)->first()) {
            $emailErr = "no user found";
            return \Redirect::back()->withErrors([$emailErr]);
        }
        $address= new Address();
        $address->user_id=$user;
        $address->country=$request['country'];
        $address->city=$request['city'];
        $address->address=$request['address'];
        $address->address_additional=$request['address_additional'];
        $address->postal_code=$request['postal_code'];
        $address->type=$request['type'];
        $address->save();
            return redirect()->route('admin.address.index')->with('success', 'Address '. $request->address.' added successfully!');
        }
    protected function edit($id)
    {
        $address= Address::findOrFail($id);
        return view('admin.forms.address.edit',compact('address'));

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
            $address= Address::findOrFail($request['address_id']);
        $address->country=$request['country'];
        $address->city=$request['city'];
        $address->address=$request['address'];
        $address->address_additional=$request['address_additional'];
        $address->postal_code=$request['postal_code'];
        $address->type=$request['type'];
        $address->updated_at=date('Y-m-d');
        $address->save();
        return redirect()->route('admin.address.index')->with('success', 'Address '. $request->address.' updated successfully!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $address=Address::findOrFail($request->id);
        $address->delete();
        return back()->with('success', 'Address deleted!');
    }



}
