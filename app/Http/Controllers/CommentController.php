<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\User;
use App\Models\Art;
use Carbon\Carbon;
use App\Models\Forumcomment;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $commentss = Comment::all();
        $artID = Comment::where('artID')->get();
       
    }

    public function store(Request $request)
    {
        // error_log(Session::get('username'));
        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment =  new Comment();
        $comment->artID = $request->get('artID');
        $comment->username = Session::get('username');

        // $rate = 0;
        // if($request->get('rate') != null) {
        //     $rate = $request->get('rate');
        // }
        // $comment->rate = $rate;

        $comment->rate = $request->get('rate');

        $comment->comment_body = $request->get('comment_body');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $comment->datetime = $date;

        // if (Auth::check()) {
        //     return redirect('login')->with('message', 'Please login to comment');
        // }

        $save = $comment->save();
        if ($save) {
            error_log('test1');
            return redirect()->back()->with('message', 'Comment posted');
        } else {
            error_log('test2');
            return redirect()->back()->with('message', 'Unable to create comment');
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
            return redirect()->back()->with('message', 'Comment posted');
        } else {
            return redirect()->back()->with('message', 'Unable to create comment');
        }

    }

    public function removeForumComment($postID)
    {
        $removecmt = Forumcomment::where('username', Session::get("username"))->where('postID', $postID)->first();

        if ($removecmt != null) {
            $removecmt->delete();
            return redirect()->back()->with('message', 'Comment removed successfully');
        }

        return redirect("/storeDetails/" . $postID)->with(['fail' => 'Wrong ID!!']);
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
