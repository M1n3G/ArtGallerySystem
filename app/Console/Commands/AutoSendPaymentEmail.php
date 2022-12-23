<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\paymentReminder;
use Illuminate\Support\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class AutoSendPaymentEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:PaymentReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Sent Payment Reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $payment = DB::table('auction')
        ->join('users','users.username','=','auction.username')
        ->select('users.*','auction.*')
        ->get();

        $item = DB::table('users')
        ->join('bid','users.username','=','bid.Bidder')
        ->select('users.*','bid.*')
        ->get();

        foreach($payment as $row){
            if($row->auctionStatus == 'SEND'){
                foreach($item as $rows){
                    if($rows->auctionID == $row->auctionID){
                        Mail::to($rows->email)->send(new \App\Mail\paymentReminder($rows->email));

                        DB::table('auction')->where('auctionID',$rows->auctionID)->update(['auctionStatus'=>'Process']);

                    }
                }
            }elseif($row->auctionStatus == 'LOST'){
                foreach($item as $rows){
                    if($rows->auctionID == $row->auctionID){
                        \Mail::to($rows->email)->send(new \App\Mail\paymentTImeOut($rows->email));

                        DB::table('auction')->where('auctionID',$rows->auctionID)->update(['auctionStatus'=>'LOST']);
                    }
                }
            }
        }
    }
}