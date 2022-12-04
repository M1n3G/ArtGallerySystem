<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Art;
use App\Models\Workshop;
use Illuminate\Support\Facades\Session;
use App\Models\Artcategories;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ArtistController extends Controller
{
    public function upgradeAccount(Request $request)
    {
        $date =  Carbon::now()->format('Y-m-d H:i:s');

        $user = Session::get('username');

        $art =  new Art();
        $art->artID = $this->generateArtID();
        $art->username = Session::get('username');
        $art->artistName = $request->get('artistName');
        $art->artName = $request->get('title');
        $art->artDesc = $request->get('artDesc');
        $art->category_id = $request->get('category_id');
        $art->artStyle = $request->get('style');
        $art->artYear = $request->get('artYear');
        $art->artPrice = $request->get('artPrice');
        $art->datetime = $date;
        $art->artStatus = "AVAILABLE";

        $workshop = new Workshop();
        $workshop->userID = Session::get('username');
        $workshop->name = $request->get('workshopName');
        $workshop->establisher = $request->get('shopEstablisher');
        $workshop->address = $request->get('workshopAddress');
        $workshop->city = $request->get('city');
        $workshop->state = $request->get('state');
        $workshop->postcode = $request->get('postcode');
        $workshop->description = $request->get('shopDesc');
        $workshop->email = $request->get('emailAddress');
        $workshop->phone = $request->get('phoneNumber');
        $workshop->createDate = $request->get('shopCreateDate');



        if ($request->hasFile('artImg')) {
            $image = $request->file('artImg');
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $art->artImg = $uploadedFileUrl;
        }



        if ($art->save() && $workshop->save()) {
            DB::table('users')
                ->where('username', $user)
                ->update([
                    'userRole' => "Artist"
                ]);

            return redirect('/profile')->with('success', 'Account Upgrade Successfully');
        } else {
            return redirect("/login");
        }
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
}
