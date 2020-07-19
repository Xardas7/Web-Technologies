<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Card;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
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
            $cards=Card::where('user_id',$key)->get();
            return view('admin.forms.card.index', compact('cards'));
        }
            elseif (request('id') != null) {
                $key = request('id');
                    $cards=Card::where('id',$key)->get();
                    return view('admin.forms.card.index', compact('cards'));
                }
                else{
            $cards=Card::all();
            return view('admin.forms.card.index', compact('cards'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            return \Redirect::back()->withErrors([$emailErr]);
        }
        if (!User::where('email',$request->email)->first()) {
            $emailErr = "no user found";
            return \Redirect::back()->withErrors([$emailErr]);
        }
        $exp_date = $request->exp_date;
        $exp_date = str_replace('/','-',$exp_date);
        $exp_date = \DateTime::createFromFormat('Y-m', $exp_date);
        $exp_date = $exp_date->format('Y-m-t');
        $user=User::where('email',$request['email'])->first()->id;
        $card= new Card();
        $card->user_id=$user;
        $card->type=$request['type'];
        $card->card_number=$request['card_number'];
        $card->name=$request['name'];
        $card->surname=$request['surname'];
        $card->exp_date=$exp_date;
        $card->cvv=$request['cvv'];
        $card->save();
        return redirect()->route('admin.cards.index')->with('success', 'Address '. $request->address.' added successfully!');

    }
    protected function edit($id)
    {
        $card= Card::findOrFail($id);
        return view('admin.forms.card.edit',compact('card'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $vote=UserParticipatesParty::find($request->id);
        $track = Track::where('id',$vote->vote)->first();
        $track->votes -=1;
        $track->save();
         $request->track_id;
        $track = Track::find($request->track_id);
        $track->votes += 1;
        $track->save();
        $vote->vote=$request->track_id;
        $vote->save();
        return redirect()->back()->with('success','vote changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $card=Card::find($request->id);
        $card->delete();
        return redirect()->back()->with('success','card deleted!');
    }
}
