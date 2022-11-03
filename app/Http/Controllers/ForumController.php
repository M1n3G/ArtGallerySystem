<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Art;

class ForumController extends Controller
{
    public function forumhome()
    {
        return view('forum/forumhome');
    }
}
