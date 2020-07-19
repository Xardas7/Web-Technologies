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
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
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
        $user=User::where('email',$request->email)->first();
            if($user!=null ) {
                $producer = Producer::find($user->id);
                if ($producer == null) {
                    $user_id = $user->id;
                    $producer = new Producer();
                    $producer->name = $request['name'];
                    $producer->user_id = $user_id;
                    $producer->save();
                    $user->assignRole('producer');
                    return redirect()->route('admin.producer.index')->with('success', 'Producer ' . $request->code . ' added successfully!');
                }
                $emailErr = "this user is already an producer";
                return \Redirect::back()->withErrors([$emailErr]);
            }
            else {
            $emailErr = "User not found";
            return \Redirect::back()->withErrors([$emailErr]);
        }
    }
    protected function edit($id)
    {
        $producer= Producer::findOrFail($id);
        return view('admin.forms.other.producers.edit',compact('producer'));

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
        $producer = Producer::find($request->id);
        $producer->name = $request['name'];
        $producer->save();
        return redirect()->route('admin.producer.index')->with('success', 'Producer ' . $request->code . ' updated successfully!');

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
        $producer->user->removeRole('producer');
        $producer->delete();
        return back()->with('success', 'producer deleted!');
    }



}
