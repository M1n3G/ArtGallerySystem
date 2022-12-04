<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->string('paymentID')->primary();
            $table->string('userID');
            $table->string('itemID');
            $table->float('totalPay');
            $table->float('finalPay');
            $table->string('card');
            $table->string('cardType');
            $table->string('paymentStatus');
            $table->string('dateTime');
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
        Schema::dropIfExists('payment');
    }
}
