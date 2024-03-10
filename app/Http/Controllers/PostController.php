<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    //

    public function post_page()
    {
        $categories = Category::all();

        return view('posts.add_post',['category'=>$categories]);
    }

    public function create_post(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'post_topic' => 'required|max:255',
            'post_content' => 'required',
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
            // 'post_likes' can be omitted since it's likely to be a counter field and not a user input
        ]);

        // Assuming 'post_writer' should be the authenticated user's ID
        $validatedData['post_writer'] = Auth::id();

        // Create and save the post
        $post = new Post($validatedData);

        try {
            // Database operation
            // For instance: $post->save();
            $post->save();
            return redirect()->route('home')->with('success', 'Post created successfully.');
        } catch (QueryException $exception) {
            // Handle error
            return redirect()->back()->withErrors('There was an error saving the post: ' . $exception->getMessage())->withInput();
        }

        // Redirect to a route or back with a success message
    }

    public function view_post($id){
        $posts=Post::with('category')->findOrFail($id);
        $comments=Post::with(['comments.post'])->findOrFail($id);
        $likes = Post::with(['likes.post'])->findOrFail($id);
        $categories = Category::all();

        return view('posts.view_post',['post'=>$posts,'comment'=>$comments,'like_post'=>$likes,'categories'=>$categories]);
    }


}

