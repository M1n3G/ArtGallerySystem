<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create()
    {
        $comment = Comment::all();
        return view('/storeDetails', compact('comments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment =  new Comment();
        $comment->artID = $request->get('artID');
        $comment->username = Session::get('username');
        $comment->comment_body = $request->get('comment_body');
        date_default_timezone_set("Asia/Kuala_Lumpur");           
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $comment->datetime = $date;

        if ($comment->save()) {
            return redirect()->back()->with('message', 'Commented successfully');
        } else {
            return redirect()->back()->with('message', 'Unable to create comment');
        }

        // return redirect()->back()->with('message', 'Unable to create comment');

        if (Auth::check()) {
            return redirect('login')->with('message', 'Please login to comment');
        }
    }


    // public function store(Request $request)
    // {
    //     $comment = new Comment;
    //     $comment->body = $request->get('comment_body');
    //     $comment->user()->associate($request->user());
    //     $post = Post::find($request->get('post_id'));
    //     $post->comments()->save($comment);

    //     return back();
    // }

    // public function replyStore(Request $request)
    // {
    //     $reply = new Comment();
    //     $reply->body = $request->get('comment_body');
    //     $reply->user()->associate($request->user());
    //     $reply->parent_id = $request->get('comment_id');
    //     $post = Post::find($request->get('post_id'));

    //     $post->comments()->save($reply);

    //     return back();

    // }
}
