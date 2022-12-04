<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Artcategories;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\CountdownTimer;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuctionController extends Controller
{

    public function create()
    {
        // $category = DB::table('artcategories')->get();
        $category = Artcategories::all();
        return view('auction/addAuction', compact('category'));
    }

    public function view()
    {
        $timer = CountdownTimer::first();
        return view('timer.view', compact('timer'));
    }

    public function index()
    {
        $cat = Artcategories::join('auction', 'auctionCate', '=', 'artcategories.id')->select('auction.auctionCate', 'artcategories.name')->distinct()->get();

        $auction = DB::table('auction')->where('auctionStatus', '=', 'Available')->get();
        return view('auction/auction', compact('auction', 'cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'artDesc' => 'required|min:20',
            'auctionImg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required',
            'startPrice' => 'required|integer',
            'endPrice' => 'required|integer',
            'auctionTime' => 'required'
        ]);
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');

        $tomorrow = Carbon::tomorrow();

        if ($request->get('startPrice') >= $request->get('endPrice')) {
            return redirect()->back()->with('fail', 'Start cannot be less than end price.');
        } elseif ($request->get('auctionTime') <= $date && $request->get('auctionTime') <= $tomorrow) {
            return redirect()->back()->with('fail', 'time cannot less than current time');
        } else {
            $auction =  new Auction();
            $auction->auctionID = $this->generateAuctionID();
            $auction->username = Session::get('username');
            $auction->auctionName = $request->get('title');
            $auction->auctionDesc = $request->get('artDesc');
            $auction->auctionCate = $request->get('category_id');
            $auction->startPrice = $request->get('startPrice');
            $auction->endPrice = $request->get('endPrice');
            $auction->start_date = $request->get('auctionTime');
            $auction->auctionStatus = "Available";
        }

        if ($request->hasFile('auctionImg')) {
            $image = $request->file('auctionImg');
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $auction->auctionImg = $uploadedFileUrl;
        }

        if ($auction->save()) {
            return redirect('/auction/auction')->with('success', 'Auction Item created Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to create Auction Item');
    }

    public static function generateAuctionID(int $length = 8): string
    {
        $auction_id = rand(10000, 99999); //Generate random string
        $exists = DB::table('auction')
            ->where('auctionID', '=', $auction_id)
            ->get(['auctionID']); //Find matches for id = generated id

        if (isset($exists[0]->id)) { //id exists in users table
            return self::generateAuctionID(); //Retry with another generated id
        }

        return $auction_id; //Return the generated id as it does not exist in the DB
    }

    public function viewDetails($auctionID)
    {

        // $result=$this->auction->viewDetails($auctionID);
        $result = DB::table('auction')
            ->where('auctionID', '=', $auctionID)
            ->get();

        //  $name = User::join('auction', 'username', '=', 'users.username')->select('auction.username', 'users.name')->distinct()->get();
        $users = DB::table('users')
            ->join('auction', 'auction.username', '=', 'users.username')
            ->select('users.*', 'users.name')
            ->distinct()
            ->get();
        // $users=Auction::with('userName')->get();
        // $userss=User::with('userName')->get();
        return view('auction/auctionDetails', compact('result', 'users'));
    }

    public function oneBid($auctionID)
    {
        $result = DB::table('auction')
            ->where('auctionID', '=', $auctionID)
            ->get();

        // $resultPayment = new Payment();
        // $resultPayment ->paymentID=$this->generatePaymentID();
        // $resultPayment -> userID = $result->username;
        // $resultPayment -> itemID = $result->auctionID;
        // $resultPayment -> totalPay = $result -> endPrice;
        // $resultPayment -> finalPay = $result -> endPrice +5;
        // $resultPayment -> paymentStatus = "processing";
        // $resultPayment->save();


        return view('/payment/payment', compact('result'));
    }

    public static function generatePaymentID(int $length = 8): string
    {
        $payment_id = rand(100000, 9999999); //Generate random string
        $exists = DB::table('payment')
            ->where('paymentID', '=', $payment_id)
            ->get(['paymentID']); //Find matches for id = generated id

        if (isset($exists[0]->id)) { //id exists in users table
            return self::generatePaymentID(); //Retry with another generated id
        }

        return $payment_id; //Return the generated id as it does not exist in the DB
    }
}
