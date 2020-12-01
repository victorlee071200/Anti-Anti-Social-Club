<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);

    }

    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->with('user', 'likes')->paginate(20); //return all items in a collection
        $posts = Post::latest()->with('user', 'likes')->paginate(20);

        return view('posts.index', ['posts' => $posts]);
        
        return view('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:19999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){

            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image');

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } 
        else
        {

            $fileNameToStore = 'noimage.jpg';

        }

        // $request->user()->posts()->create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'cover_imge' => $fileNameToStore,           

        // ]);

        

        // Post::create([
        //     'user_id' => auth()->id,
        //     'body' => $request->body,
        // ]);

        // auth()->user()->posts()->create();

        $post = new Post;
        $post->user_id = auth()->id();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->save();

        // $request->user()->posts()->create($request->only(['body', 'title']));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }


}
