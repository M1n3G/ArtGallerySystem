<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Forumcomment;
use Carbon\Carbon;
use App\Models\Forumcategories;
use App\Models\Artcategories;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Session;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|integer'
        ]);

        $post =  new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        // error_log('Hello' . $request->image);
        if ($request->hasFile('image')) {
            // $des_path = 'public/Img/Post';
            // $img = $request->file('image');
            // $img_name = $img->getClientOriginalName();
            // $posts = $request->file('image')->storeAs($des_path, $img_name);
            $image = $request['image'];
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $post->image = $uploadedFileUrl;
        }



        $post->category_id = $request->get('category_id');
        $post->status = $request->status;

        $post->created_by = Session::get('username');
        // $post->imageurl = $uploadedFileUrl

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

    public function viewPost($category_id, $title, $postID)
    {
        $category = Forumcategories::where('id', $category_id)->where('status', 'Visible')->first();

        if ($category) {
            $posts = Post::where(['category_id' => $category_id, 'status' => 'Visible', 'title' => $title])->first();
            $latest_posts = Post::where(['category_id' => $category_id, 'status' => 'Visible'])->orderBy('datetime', 'DESC')->get()->take(10);

            $comments = Forumcomment::where('postID', $postID)->orderBy('datetime', 'DESC')->paginate(10);
            $com = Forumcomment::where('postID', $postID)->where('username', Session::get('username'))->get();
            $counts = Forumcomment::where('postID', $postID)->count();

            return view('forum/showpost', compact('posts', 'category', 'latest_posts'));
        } else {
            return redirect('/forum');
        }
    }

    public function index()
    {
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();
        $category = Forumcategories::with('posts')->paginate(10);

        $post = Post::all();
        return view('forum/forum', compact('category', 'cat', 'post'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|integer'
        ]);

        $post =  Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        if ($request->hasFile('image')) {
            $des_path = 'public/Img/Post';
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName();
            $posts = $request->file('image')->storeAs($des_path, $img_name);
            $post->image = $img_name;
        }

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
