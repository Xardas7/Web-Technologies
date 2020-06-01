<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Card;
use Carbon\Carbon;

class CardController extends Controller
{
    public function create(){
        return view('user.card.create');
    }

    public function store(Request $request){

        $user = Auth::user();

        $exp_date = $request->exp_date;
        $exp_date = str_replace('/','-',$exp_date);
        $exp_date = \DateTime::createFromFormat('Y-m', $exp_date);
        $exp_date = $exp_date->format('Y-m-t');

        $card = $user->cards()->create([
            'type'        => $request->type,
            'card_number' => $request->card_number,
            'name'        => $request->name,
            'surname'     => $request->surname,
            'exp_date'    => $exp_date,
            'cvv'         => $request->cvv
        ]);

        alert()->success('Card saved','Your card has been saved')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();

        return redirect()->route('user.settings');

    }
}
