<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Forumcomment;
use Carbon\Carbon;
use App\Models\Forumcategories;
use App\Models\Artcategories;
use App\Models\View;
use App\Models\Report;
use App\Models\Bookmark;
use App\Models\Subscription;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthCheck', ['except' => ['viewCategoryPost', 'viewPost', 'index', 'show']]);
    }

    public function create()
    {
        $category = Forumcategories::all();
        return view('forum/createpost', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'task-textarea' => 'required|min:10',
            'category_id' => 'required|integer'
        ]);

        $post =  new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('task-textarea');

        // error_log('Hello' . $request->image);
        if ($request->hasFile('image')) {
            $des_path = 'images/';
            $img = $request->file('image');
            $img_name = "" . $request['title'] . " " . Session::get('username') . ".jpg";
            $posts = $request->file('image')->storeAs($des_path, $img_name);
            // $image = $request['image'];
            // $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            // $post->image = $uploadedFileUrl;
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

    public function subscribe(Request $request, $id)
    {
        $subscription = new Subscription();
        $subscription->username = Session::get('username');
        $subscription->category_id = $id;

        if ($subscription->save()) {
            return redirect("/forum/category/" . $id)->with('success', 'You have subscribed this topic.');
        }
    }

    public function unsubscribe($id)
    {
        $username = Session::get('username');
        $subscription = Subscription::where('username', $username)->where('category_id', $id)->first();

        if ($subscription != null) {
            $subscription->delete();
            return redirect("/forum/category/" . $id)->with('success', 'You have unsubscribed this topic.');
        }

        return redirect()->route('forum/forum')->with(['fail' => 'Wrong Post!!']);
    }

    public function viewCategoryPost($id)
    {
        $category = Forumcategories::where('id', $id)->where('status', 'Visible')->first();
        $subscribe = false;
        $username = Session::get('username');
        $subscribed = Subscription::where('username', $username)->where('category_id', $id)->first();

        if ($subscribed) {
            $subscribe = true;
        }

        if ($category) {
            $post = Post::where(['category_id' => $category->id, 'status' => 'Visible'])->orderBy('datetime', 'DESC')->paginate(10);
            return view('forum/showcatpost', compact('post', 'category', 'subscribe'));
        } else {
            return redirect('/forum');
        }
    }

    public function viewPost(Request $request)
    {
        $username = Session::get('username');
        $postID = $request->input('postID');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $category = Forumcategories::where('id', $category_id)->where('status', 'Visible')->first();
        $message = '';
        $messagedanger = '';
        $messagedanger1 = '';

        $postCountExist = View::where('postID', $postID)->where('username', Session::get('username'))->first();

        if ($username != null) {
            if (!$postCountExist) {
                $views = new View();
                $views->postID = $postID;
                $views->username = $username;
                $views->save();
            }
        }

        if ($category) {
            // $posts1 = Post::find($id);
            $posts = Post::where(['category_id' => $category_id, 'status' => 'Visible', 'title' => $title])->first();
            $latest_posts = Post::where(['category_id' => $category_id, 'status' => 'Visible'])->orderBy('datetime', 'DESC')->get()->take(10);
            $showCom = Forumcomment::where('postID', $posts->id)->orderBy('datetime', 'DESC')->paginate(10);
            $com = Forumcomment::where('postID', $postID)->where('username', Session::get('username'))->get();
            $commentcount = Forumcomment::where('postID', $posts->id)->count();
            $postcount = View::where('postID', $postID)->count();

            return view('forum/showpost', compact('posts', 'category', 'latest_posts', 'showCom', 'postcount', 'commentcount', 'com', 'message', 'messagedanger', 'messagedanger1'));
        } else {
            return redirect('/forum');
        }
    }

    public function viewPost1($postID, $category_id, $title, $action)
    {
        $username = Session::get('username');
        $category = Forumcategories::where('id', $category_id)->where('status', 'Visible')->first();
        $message = '';
        $messagedanger = '';
        $messagedanger1 = '';
        $postCountExist = View::where('postID', $postID)->where('username', Session::get('username'))->first();
        if ($action == "report") {
            $message = "Reported successfully";
        } else if ($action == "edit") {
            $message = "Edited successfully";
        } else if ($action == "bookmark") {
            $message = "Save Post successfully";
        } else if ($action == "bookmarkexist") {
            $messagedanger = "You have save this post in your bookmarks.";
        } else if ($action == "reportexist") {
            $messagedanger1 = "You have been reported this post.";
        }

        if ($username != null) {
            if (!$postCountExist) {
                $views = new View();
                $views->postID = $postID;
                $views->username = $username;
                $views->save();
            }
        }

        if ($category) {
            // $posts1 = Post::find($id);
            $posts = Post::where(['category_id' => $category_id, 'status' => 'Visible', 'title' => $title])->first();
            $latest_posts = Post::where(['category_id' => $category_id, 'status' => 'Visible'])->orderBy('datetime', 'DESC')->get()->take(10);
            $showCom = Forumcomment::where('postID', $posts->id)->orderBy('datetime', 'DESC')->paginate(10);
            $com = Forumcomment::where('postID', $postID)->where('username', Session::get('username'))->get();
            $commentcount = Forumcomment::where('postID', $posts->id)->count();
            $postcount = View::where('postID', $postID)->count();
            return view('forum/showpost', compact('posts', 'category', 'latest_posts', 'showCom', 'postcount', 'commentcount', 'com', 'message', 'messagedanger', 'messagedanger1'));
        } else {
            return redirect('/forum');
        }
    }

    public function storeReport(Request $request)
    {
        $report = new Report;

        $postID = $request->input('postID');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $username = Session::get('username');

        $reportID = "RID-" . random_int(10000001, 99999999);
        $getReportID = Report::where('reportID', $reportID)->get();
        while (count($getReportID) != 0) {
            $reportID = "RID-" . random_int(10000001, 99999999);
            $getReportID = Report::where('reportID', $reportID)->get();
        }

        $reportCountExist = Report::where('postID', $postID)->where('username', Session::get('username'))->first();

        if ($username != null) {
            if (!$reportCountExist) {
                $report->reportID = $reportID;
                $report->postID = $request->input('postID');
                $report->username = Session::get('username');
                $report->reportType = $request->input('report');
                $report->reportBody = $request->get('reportBody');
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date =  Carbon::now()->format('Y-m-d H:i:s');
                $report->datetime = $date;
                $report->save();
                return $this->viewPost1($postID, $category_id, $title, "report");
            } else {
                return $this->viewPost1($postID, $category_id, $title, "reportexist");
            }
        }

        return redirect()->back()->with('fail', 'Unable to report post');
    }

    public function index()
    {
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();
        $category = Forumcategories::with('posts')->where('status', 'Visible')->paginate(10);

        $post = Post::all();
        $comment = Forumcomment::all();
        return view('forum/forum', compact('category', 'cat', 'post', 'comment'));
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
        ]);

        $post =  Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        if ($request->hasFile('image')) {
            $image = $request['image'];
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $post->image = $uploadedFileUrl;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $post->datetime = $date;

        if ($post->update()) {
            $postID = $request->input('postID');
            $category_id = $request->input('category_id');
            $title = $request->input('title');
            return $this->viewPost1($postID, $category_id, $title, "edit");
            // return redirect('/forum/category/post')->with('success', 'Post edited Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to update post');
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();

        if ($post != null) {
            $post->delete();
            return redirect(('/forum'))->with('success', 'Post Delete Successfully');
        }

    }

    public function storeBookmarks(Request $request)
    {
        $bookmark = new Bookmark;

        $postID = $request->input('postID');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $username = Session::get('username');

        $bookmarkID = "BID-" . random_int(10000001, 99999999);
        $getBookmarkID = Bookmark::where('bookmarkID', $bookmarkID)->get();
        while (count($getBookmarkID) != 0) {
            $bookmarkID = "BID-" . random_int(10000001, 99999999);
            $getBookmarkID = Bookmark::where('bookmarkID', $bookmarkID)->get();
        }

        $bookmarkCountExist = Bookmark::where('postID', $postID)->where('username', Session::get('username'))->first();

        if ($username != null) {
            if (!$bookmarkCountExist) {
                $bookmark = new Bookmark();
                $bookmark->bookmarkID = $bookmarkID;
                $bookmark->postID = $request->input('postID');
                $bookmark->username = Session::get('username');
                $bookmark->save();
                return $this->viewPost1($postID, $category_id, $title, "bookmark");
            } else {
                return $this->viewPost1($postID, $category_id, $title, "bookmarkexist");
            }
        }

        return redirect()->back()->with('fail', 'Unable to report post');
    }
}
