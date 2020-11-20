<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5); //return all items in a collection

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
}
