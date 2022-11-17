<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        return view('frontend.wishlist', compact('user', 'wishlists'));
        $wishlist = Wishlist::where('userID', Auth::id())->get();
        return view('/wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        $artID = $request->get('artID');
        if (Wishlist::where('userID', Auth::id())->where('artID')->exists()) {
            return redirect()->back()->with('message', 'Art already added to wishlist');
        } else {
            $wishlist = new Wishlist();
            $wishlist->userID = Auth::id();
            $wishlist->artID = $artID;
            $wishlist->save();
            return redirect('/storeDetails')->with('message', 'Art is added to wishlist');
        }
    }

    public function removeWishlist($id)
    {
    }
}
