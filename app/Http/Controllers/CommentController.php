<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        // if (Auth::check()) {
        $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment =  new Comment();
        $user_id =  User::where('userID', $id)->firstorFail();
        Comment::create([
            'post_id' => $comment->id,
            'user_id' => $user_id->user_id,
            'comment_body' => $request->comment_body
        ]);

        if ($comment->save()) {
            return redirect()->back()->with('message', 'Commented successfully');
        } else
            redirect()->back()->with('message', 'Please login to comment');
        // return redirect()->back()->with('message', 'Unable to create comment');

        // } else {
        //     redirect()->back()->with('message', 'Please login to comment');
        // }


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
