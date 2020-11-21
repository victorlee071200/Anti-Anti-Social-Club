<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->with('user', 'likes')->paginate(20); //return all items in a collection
        $posts = Post::latest()->with('user', 'likes')->paginate(20);

        return view('posts.index', ['posts' => $posts]);
        
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth()->id,
        //     'body' => $request->body,
        // ]);

        // auth()->user()->posts()->create();

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}
