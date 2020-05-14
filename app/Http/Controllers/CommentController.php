<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function update(Request $request, $id)
    {
        //
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $commentSearch = Comment::where('user_id',$user->id)->where('product_id',$request->product_id)->first();

        //Se la recensione è già presente viene aggiornata
        if($commentSearch){
            $commentSearch->content = $request->content;
            $commentSearch->vote = 'two';
            $commentSearch->save();
        } else {
        //Altrimenti viene inserita da zero
            $comment = Comment::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'content' => $request->content,
                'vote' => 'one'
            ]);
        }
        return redirect()->back();

    }
}
