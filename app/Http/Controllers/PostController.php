<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;

class PostController extends Controller
{
    public function create()
    {
        return view('forum/createpost');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('forum');
    }

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::select('id', 'title')->get();
        return view('forum/forum', compact('posts'));
      
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('forum/showpost', compact('post'));
    }
}
