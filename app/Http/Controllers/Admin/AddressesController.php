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
        return view('admin.forms.ban.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            return redirect()->route('admin.ban.index')->with('success', 'User '. $request->banned.' banned by '.$request->user.' successfully!');
            return redirect()->back()->withErrors(['user already banned']);
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
        $a= new MainController;
        $a->verify();
        $user=UserBanUser::findOrFail($request->id);
        $user->delete();
        return back()->with('success', 'Ban deleted!');
    }



}
