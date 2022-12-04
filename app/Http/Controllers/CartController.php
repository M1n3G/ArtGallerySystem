<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Art;
use App\Models\cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthCheck');
    }

    public function cartshow()
    {
        $username = session()->get('username');

        // $cart =DB::table('cart')
        // ->where('userID', '=', $username)
        // ->distinct()
        // ->get();

        $cart = DB::table('art')
            ->join('cart', 'cart.itemID', '=', 'art.artID')
            ->where('userID', '=', $username)
            ->select('cart.*', 'art.artStatus')
            ->get();

        $count = Cart::where('userID',$username)->count();

        return view('/cart', compact('cart', 'count'));
    }

    public function addcart(Request $request)
    {

        if ($request->session()->has('username')) {

            $cart = new Cart();

            $cart->userID = Session::get('username');
            $cart->itemID = $request->id;
            $cart->itemName = $request->name;
            $cart->artImg = $request->image;
            $cart->Price = $request->price;
            $cart->quantity = $request->quantity;
            $cart->totalPrice = $request->price;

            $cart->save();
            return redirect()->back()->with('message1', 'Art is added to cart');
        } else {
            return redirect('login');
        }
    }

    public function destroy($cartID)
    {
        // $artwork = Cart::where('cartID', $cartID)->first();
        DB::table('cart')
            ->where('cartID', $cartID)
            ->delete();


        return redirect('/cart')->with('msg', 'Remove Successfully');
    }
}
