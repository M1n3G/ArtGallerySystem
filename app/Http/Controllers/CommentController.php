<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\User;
use App\Models\Art;
use Carbon\Carbon;
use App\Models\Forumcategories;
use App\Models\View;
use App\Models\Forumcomment;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\Dislikes;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        $artID = Comment::where('artID')->get();
    }

    public function store(Request $request)
    {
        // error_log(Session::get('username'));
        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $artID = $request->input('artID');
        $username = Session::get('username');
        $commentCountExist = Comment::where('artID', $artID)->where('username', Session::get('username'))->first();

        if ($username != null) {
            if (!$commentCountExist) {
                $comment =  new Comment();
                $comment->artID = $request->get('artID');
                $comment->username = Session::get('username');
                $comment->rate = $request->get('rate');
                $comment->comment_body = $request->get('comment_body');
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date =  Carbon::now()->format('Y-m-d H:i:s');
                $comment->datetime = $date;
                $comment->save();
                return redirect()->back()->with('message', 'Comment posted');
            } else {
                return redirect()->back()->with('warning', 'You already comment this art');
            }
        }
    }

    public function updateComment(Request $request)
    {
        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $id = $request->input('id');
        $artID = $request->input('artID');

        $art = Comment::where('id', $id)->where('artID', $artID)
            ->update([
                'comment_body' => $request['comment_body']
            ]);

        return redirect("/storeDetails/" . $artID)->with('message', 'Comment updated');
    }

    public function viewPost($postID, $category_id, $title)
    {
        $username = Session::get('username');
        $category = Forumcategories::where('id', $category_id)->where('status', 'Visible')->first();
        $message = '';
        $messagedanger = '';
        $messagecomment = '';
        $messagelike = '';
        $messagedislike = '';
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
            $likecount = Likes::where('postID', $postID)->count();
            $dislikecount = Dislikes::where('postID', $postID)->count();

            $messagecomment = 'Comment Posted';

            return view('forum/showpost', compact('posts', 'category', 'latest_posts', 'showCom', 'postcount', 'commentcount', 'com', 'message', 'messagedanger', 'messagecomment','messagelike','messagedislike','likecount','dislikecount'));
        } else {
            return redirect('/forum');
        }
    }

    public function storeForumComment(Request $request)
    {
        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment1 =  new Forumcomment();
        $comment1->postID = $request->get('postID');
        $comment1->category_id = $request->input('category_id');
        $comment1->username = Session::get('username');
        $comment1->comment_body = $request->get('comment_body');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $comment1->datetime = $date;

        if ($comment1->save()) {
            $postID = $request->input('postID');
            $category_id = $request->input('category_id');
            $title = $request->input('title');
            return $this->viewPost($postID, $category_id, $title);
            // return redirect()->back()->with('message', 'Comment posted');
        } else {
            return redirect()->back()->with('message', 'Unable to create comment');
        }
    }

    public function removeForumComment(Request $request, $id)
    {
        $removecmt = Forumcomment::where('username', Session::get("username"))->where('id', $id)->first();

        $removecmt->delete();
        $postID = $request->input('postID');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        return $this->viewPost($postID, $category_id, $title);
        // return redirect()->back()->with('message', 'Comment removed successfully');
    }

    public function reply(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }
}
