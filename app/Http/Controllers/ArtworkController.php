<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artcategories;
use App\Models\User;
use App\Models\Art;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ArtworkController extends Controller
{
    public function list()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();


        $artwork = DB::table('artcategories')
            ->join('art', 'art.category_id', '=', 'artcategories.id')
            ->where('username', $username)
            ->select('art.*', 'artcategories.name')
            ->distinct()
            ->paginate(10);
        return view('artwork/artworkList', compact('users', 'artwork'));
    }

    public function create()
    {
        // $category = DB::table('artcategories')->get();
        $category = Artcategories::all();
        return view('artwork/artworkAdd', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'artistName' => 'required|min:10|max:50|regex:/^[\pL\s\-]+$/u',
            'title' => 'required|min:10',
            'artDesc' => 'required|min:20|max:200',
            'artImg' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'category_id' => 'required',
            'style' => 'required',
            'artYear' => 'required|integer',
            'artPrice' => 'required|integer'
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');

        $art =  new Art();
        $art->artID = $this->generateArtID();
        $art->username = Session::get('username');
        $art->artistName = $request->get('artistName');
        $art->artName = $request->get('title');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $art->artImg = $uploadedFileUrl;
            $des_path = 'images/';
            $img = $request->file('image');
            $img_name = "" . $request['title'] . " " . Session::get('username') . ".jpg";
            $arts = $request->file('image')->storeAs($des_path, $img_name);
        }

        $art->category_id = $request->get('category_id');
        $art->artStyle = $request->get('style');
        $art->artPrice = $request->get('artPrice');
        $art->artDesc = $request->get('artDesc');
        $art->artStatus = "AVAILABLE";
        $art->artYear = $request->get('artYear');
        $art->datetime = $date;
        $art->save();
        return redirect('/artwork/artworkList')->with('success', 'Artwork created successfully');
    }

    public static function generateArtID(int $length = 8): string
    {
        $art_id = rand(100, 9999); //Generate random string
        $exists = DB::table('art')
            ->where('artID', '=', $art_id)
            ->get(['artID']); //Find matches for id = generated id

        if (isset($exists[0]->id)) { //id exists in users table
            return self::generateArtID(); //Retry with another generated id
        }

        return $art_id; //Return the generated id as it does not exist in the DB
    }

    public function editArtwork($artID)
    {
        // $category = DB::table('artcategories')->get();
        $artwork = DB::table('artcategories')
            ->join('art', 'art.category_id', '=', 'artcategories.id')
            ->where('art.artID', $artID)
            ->select('art.*', 'artcategories.name')
            ->distinct()
            ->get();
        $category = Artcategories::all();
        return view('artwork/artworkEdit', compact('artwork', 'category'));
    }

    public function saveArtwork(Request $request, $artID)
    {
        $request->validate([
            'artName' => 'required|min:10',
            'artistName' => 'required|min:10|max:50|regex:/^[\pL\s\-]+$/u',
            'artDesc' => 'required|min:20|max:200',
            'artImg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'category_id' => 'required',
            'style' => 'required',
            'artYear' => 'required|integer',
            'artPrice' => 'required|integer'
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');

        $art =  new Art();
        $art->username = Session::get('username');
        $art->artistName = $request->get('artistName');
        $art->artName = $request->get('artName');
        $art->artDesc = $request->get('artDesc');
        $art->category_id = $request->get('category_id');
        $art->artStyle = $request->get('style');
        $art->artYear = $request->get('artYear');
        $art->artPrice = $request->get('artPrice');
        $art->datetime = $date;

        $art = new Art;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $art->artImg = $uploadedFileUrl;
            $des_path = 'images/';
            $img = $request->file('image');
            $img_name = "" . $request['title'] . " " . Session::get('username') . ".jpg";
            $arts = $request->file('image')->storeAs($des_path, $img_name);
        }

        $art = Art::where('artID', $artID)
            ->update([
                'username' => Session::get('username'),
                'artistName' => $request['artistName'],
                'artName' => $request['artName'],
                'artDesc' => $request['artDesc'],
                'category_id' => $request['category_id'],
                'artStyle' => $request['style'],
                'artYear' => $request['artYear'],
                'artPrice' => $request['artPrice'],
                'artImg' => $uploadedFileUrl,
                'datetime' => $date

            ]);

        return redirect('/artwork/artworkList')->with('success', 'Artwork Edit Successfully');
    }


    public function destroy($artID)
    {
        $artwork = Art::where('artID', $artID)->first();
        $artwork->delete();
        // $this->Art->destroy($artID);

        return redirect('/artwork/artworkList')->with('msg', 'Remove Successfully');
    }
}
