<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Card;
use Carbon\Carbon;

class CardController extends Controller
{
    public function create(){
       
        return view('user.card.create');

    }

    public function store(Request $request){


        $exp_date = $request->exp_date;
        $exp_date = str_replace('/','-',$exp_date);
        $exp_date = \DateTime::createFromFormat('Y-m', $exp_date);
        $exp_date = $exp_date->format('Y-m-t');

        $validate = $request->validate([
            'type' => 'in:visa,mastercard',
            'card_number' => 'integer',
            'name' => 'string',
            'surname' => 'string',
            'exp_date' => 'string',
            'cvv' => 'digits_between:3,3',
        ]);

        $user = Auth::user();

    

        $card = $user->cards()->create([
            'type'        => $request->type,
            'card_number' => $request->card_number,
            'name'        => $request->name,
            'surname'     => $request->surname,
            'exp_date'    => $exp_date,
            'cvv'         => $request->cvv
        ]);

      

       if(!$request->ajax){
        alert()->success('Card saved','Your card has been saved')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
            return redirect()->route('user.settings');
       } else {
           $card->card_number =  preg_replace("/(.{4}$)(*SKIP)(*F)|(.)/","*",$card->card_number);
           return $card;
       }
        
        

    }

    public function edit($id){

        $user = Auth::user();
        $card = Card::find($id);
        if($user->id != $card->user->id){
            alert()->error('Error','This card does not belong to you!')
            ->animation('animate__bounce','animate__hinge')
            ->autoClose(3000)
            ->timerProgressBar();
            return back();
        }

        $exp_date = $card->exp_date;
        $exp_date = \DateTime::createFromFormat('Y-m-d', $exp_date);
        $exp_date = $exp_date->format('Y-m');
        $exp_date = str_replace('/','-',$exp_date);
        $card->exp_date = $exp_date;
        
        return view('user.card.edit',compact('card'));

    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'type' => 'in:visa,mastercard',
            'card_number' => 'integer',
            'name' => 'string',
            'surname' => 'string',
            'exp_date' => 'string',
            'cvv' => 'digits_between:3,3',
        ]);

        $card = Card::find($id);

        if($card->user->id != Auth::id()){
            alert()->error('Error','This card does not belong to you!')
            ->animation('animate__bounce','animate__hinge')
            ->autoClose(3000)
            ->timerProgressBar();
            return back();
        }

        $exp_date = $request->exp_date;
        $exp_date = str_replace('/','-',$exp_date);
        $exp_date = \DateTime::createFromFormat('Y-m', $exp_date);
        $exp_date = $exp_date->format('Y-m-t');
        
        $card->fill($request->all());
        $card->exp_date = $exp_date;
        $card->update();        
        
        alert()->success('Profile updated','Your profile has been updated')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();

        return redirect()->route('user.settings');

    }

    public function delete($id){
        $card = Card::find($id);
        if(Auth::id() != $card->user->id){
            return back()->withErrors([
                'notOwner' => 'This address does not belongs to you'
            ]);
        }
        $card->delete();
    }
}
