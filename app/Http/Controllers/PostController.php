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
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|min:10',
        ]);

        $post =  new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        if ($post->save() ) {
            return redirect('forum')->with('success','Post created Successfully');
        }
        
        return redirect()->back()->with('fail','Unable to create Post');
    }

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::select('id', 'title')->paginate(10);
        return view('forum/forum', compact('posts'));
      
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('forum/showpost', compact('post'));
    }
}
