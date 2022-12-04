<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshopDetails', function (Blueprint $table) {
            $table->increments('workshopID');
            $table->string('userID');
            $table->string('name');
            $table->string('establisher');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('postcode');
            $table->string('description');
            $table->string('email');
            $table->string('phone');
            $table->date('createDate');
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
        Schema::dropIfExists('workshop_details');
    }
}
