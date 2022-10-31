<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Art;

class ArtController extends Controller
{
    public function index()
    {
        $data = Art::paginate(12);
        return view('store', compact('data'));
    }

    public function details($artID)
    {
        $data = Art::findOrFail($artID);
        if ($data->first()) {
            $artistWork = Art::where('artistName', $data->artistName)->take(4)->get();
        }
        return view('storeDetails', compact('data', 'artistWork'));
    }
}
