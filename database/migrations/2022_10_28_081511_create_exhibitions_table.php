<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->bigIncrements('exID');
            $table->string('exName');
            $table->string('exImage', 255)->nullable();
            $table->text('exDesc');
            $table->string('exLocation');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('organiser');
            $table->text('about');
            $table->string('imageView', 255)->nullable();
            $table->text('artistIncluded');
            $table->string('contactDetails');
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
        Schema::dropIfExists('exhibitions');
    }
}
