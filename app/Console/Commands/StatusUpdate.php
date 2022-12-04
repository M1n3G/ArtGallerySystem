<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use Illuminate\Support\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:auctionStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auction Status Update';

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
        $status=DB::table('auction')->get();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now('+8')->format('Y-m-d H:i:s');

        foreach($status as $row){
                if($row->start_date <= $date){

                    DB::table('auction')->where('auctionID',$row->auctionID)->update(['auctionStatus'=>'END']);

                }
        }
    }
}