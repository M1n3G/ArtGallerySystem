<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Artcategories;
use App\Models\Art;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthCheck');
        // $this->middleware('AuthCheck', ['except' => ['index']]);
    }

    public function index()
    {
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();
        $userID = Session::get('username');
        $wishID = array();
        $wishlists = Wishlist::where('userID', $userID)->get();
        foreach ($wishlists as $wish) {
            array_push($wishID, $wish->artID);
        }
        $art = Art::whereIn('artID', $wishID)->get();
        return view('/wishlist', compact('art','cat'));
    }

    public function add($artID)
    {
        $wishlist = new WishList;
        $result = WishList::where('userID', Session::get("username"))->where('artID', $artID)->get();

        if (count($result) == 0) {
            $wishlist = new WishList;
            $wishlist->userID = Session::get("username");
            $wishlist->artID = $artID;
            $wishlist->save();
            return redirect("/store")->with('message', 'Art is added to wishlist.');
        } else {
            return redirect("/storeDetails/" . $artID)->with('warning', 'Art already added to wishlist ');
        }
    }

    public function remove($artID)
    {

        $wishlist = new WishList;
        $wishlist = wishList::where('userID', Session::get("username"))->where('artID', $artID)->first();

        if ($wishlist != null) {
            $wishlist->delete();
            return redirect('/store')->with('message', 'Art removed from wishlist.');
        }

        return redirect()->route('/store')->with(['fail' => 'Wrong ID!!']);
    }
}
