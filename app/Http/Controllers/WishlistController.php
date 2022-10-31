<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;

class ArtworkController extends Controller
{
    public function showWishlist()
    {
        $wishlist = new Wishlist;
        $result = DB::table('Wishlists')->join('artworks', 'artworks.artworkID', '=', 'Wishlists.artworkID')->select('Wishlists.*', 'artworks.*')->get();


        return view('wishlists', ['artworks' => $result]);

    }

}
