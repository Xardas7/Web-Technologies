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

        $comment = Comment::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'content' => $request->commentContent,
            'vote' => $request->vote
        ]);
    }
}
