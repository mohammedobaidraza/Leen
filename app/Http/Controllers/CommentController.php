<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->save();

        return back()->with('success', 'Comment added successfully.');
    }
}
