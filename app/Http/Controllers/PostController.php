<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('forum/post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('posts');
    }

    // public function index()
    // {
    //     $posts = Post::select('id', 'title')->get();
        
    //     return view('index', compact('posts'));
    // }

    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     return view('show', compact('post'));
    // }
}
