<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->increments('auctionID');
            $table->string('username');
            $table->string('auctionName');
            $table->string('auctionImg');
            $table->string('auctionDesc');
            $table->string('auctionCate');
            $table->float('startPrice');
            $table->float('endPrice');
            $table->dateTime('start_date');
            $table->string('auctionStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction');
    }
}
