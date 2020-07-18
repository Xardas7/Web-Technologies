<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'content' => 'string',
            'product_id' => 'integer',
            'vote' => 'integer',
        ]);


        $user = Auth::user();

        $commentSearch = Comment::where('user_id',$user->id)->where('product_id',$request->product_id)->first();

        //Se la recensione è già presente viene aggiornata
        if($commentSearch){
            $commentSearch->content = $request->content;
            $commentSearch->vote = $request->vote;
            $commentSearch->save();
        } else {
        //Altrimenti viene inserita da zero
            $comment = Comment::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'content' => $request->content,
                'vote' => $request->vote
            ]);
        }

    }
}
