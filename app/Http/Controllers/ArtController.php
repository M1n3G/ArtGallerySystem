<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Art;
use App\Models\Comment;


class ArtController extends Controller
{
    public function index()
    {
        $data = Art::inRandomOrder()->paginate(12);
        return view('store', compact('data'));
    }

    public function details($artID)
    {
        $data = Art::findOrFail($artID);
        if ($data->first()) {
            $artistWork = Art::where(['artistName'=>$data->artistName, ['artID', '!=', $artID]])->take(4)->get();
        }

        $comments = Comment::where('artID', $artID)->get();
        return view('storeDetails', compact('data', 'artistWork', 'comments'));
    }

    public function count() {
        $comments = Comment::all();
        return view('/storeDetails', compact('comments'));
    }

    public function filter() {
        $categories = Art::all();
        return view('store', compact('categories'));
    }

}
