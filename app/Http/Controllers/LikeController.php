<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    //

    public function likePost(Request $request, $postId)
    {
        $like = Like::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $postId
        ]);
        $like->save();
        if ($like->wasRecentlyCreated) {
            Post::where('id', $postId)->increment('post_likes');
        }
        return back()->with('success', 'Post liked successfully.');
    }

    public function unlikePost(Request $request, $postId)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $postId);
        if ($like->exists()) {
            $like->delete();
            Post::where('id', $postId)->decrement('post_likes');
        }
        return back()->with('success', 'Like removed successfully.');
    }
}
