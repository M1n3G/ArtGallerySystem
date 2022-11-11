<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
use Carbon\Carbon;
use App\Models\Forumcategories;
use TeamTeaTime\Forum\Database\Seeders\ForumSeeder;

class PostController extends Controller
{
    public function create()
    {
        $category = Forumcategories::all();
        return view('forum/createpost', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|min:10',
            'category_id' => 'required|integer'
        ]);

        $post =  new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');
        date_default_timezone_set("Asia/Kuala_Lumpur");           
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $post->datetime = $date;
         
        if ($post->save()) {
            return redirect('forum')->with('success', 'Post created Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to create Post');
    }

    public function viewCategoryPost($id)
    {
        $category = Forumcategories::where('id', $id)->where('status', 'Visible')->first();

        if ($category) {
            $post = Post::where(['category_id' => $category->id, 'status' => 'Visible'])->paginate(10);
            return view('forum/showcatpost', compact('post', 'category'));
        } else {
            return redirect('/forum');
        }
    }

    public function viewPost($category_id, $id)
    {
        $category = Forumcategories::where('id', $category_id)->where('status', 'Visible')->first();
        
        if ($category) {
            $posts = Post::where(['category_id' => $category_id, 'status' => 'Visible', 'id' => $id])->first();
            return view('forum/showpost', compact('posts', 'category'));
        } else {
            return redirect('/forum');
        }
    }

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::select('id', 'title', 'category_id')->paginate(10);
        return view('forum/forum', compact('posts'));
    }

    
    public function show($id)
    {
        $post = Post::find($id);
        return view('forum/showpost', compact('post'));
    }

    public function edit($id)
    {
        $category = Forumcategories::where('id', $id)->get();
        $post = Post::find($id);
        return view('forum.editpost', compact('post', 'category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|min:10',
            'category_id' => 'required|integer'
        ]);

        $post =  Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');
        date_default_timezone_set("Asia/Kuala_Lumpur");           
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $post->datetime = $date;

        if ($post->update()) {
            return redirect('/forum')->with('success', 'Post updated Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to update post');
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();

        if ($post != null) {
            $post->delete();
            return redirect('/forum')->with('success', 'Post Delete Successfully');
        }

        return redirect()->route('forum/forum')->with(['fail' => 'Wrong Post!!']);
    }
}
