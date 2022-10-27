<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = new Artwork();
        $artwork = Artwork::all();
        return view('store', compact('artwork'));
    }

    public function details($id){
        $artwork= Artwork::findOrFail($id);
        return view('storeDetails',compact('artwork'));
    }


}
