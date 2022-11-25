<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;

class ForumProfileController extends Controller
{
    public function forumProfile()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();
        return view('forum/forumprofile', compact('users'));
    }
}
