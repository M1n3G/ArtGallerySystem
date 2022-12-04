<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use App\Models\Post;
use App\Models\Bookmark;
use App\Models\Subscription;
use App\Models\Forumcategories;
use App\Models\Report;

class ForumProfileController extends Controller
{
    public function forumProfile()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();

        $bookmarks = Bookmark::where('username', $username)->get();
        $bookpost = Bookmark::join('posts', 'posts.id', '=', 'bookmarks.postID')->select('posts.*')->orderBy('created_at', 'DESC')->paginate(10);

        $subscribe = Subscription::where('username', $username)->get();
        $subscribecat = Subscription::join('forumcategories', 'forumcategories.id', '=', 'subscriptions.category_id')->where('subscriptions.username',$username)->select('forumcategories.*')->orderBy('created_at', 'DESC')->paginate(10);

        $posts = Post::where('created_by', $username)->orderBy('created_at', 'DESC')->paginate(10);

        $report = Report::where('username', $username)->get();
        $reports = Report::join('posts', 'posts.id', '=', 'reports.postID')->where('reports.username',$username)->select('posts.*')->orderBy('created_at', 'DESC')->paginate(10);

        return view('forum/forumprofile', compact('users','bookpost','posts','subscribecat','report'));
    }
}
