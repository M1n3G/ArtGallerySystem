<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function (Blueprint $table) {
            $table->increments('artID');
            $table->string('artistName');
            $table->string('artName');
            $table->string('artImg', 255);
            $table->string('artMedium');
            $table->string('artStyle');
            $table->float('artPrice');
            $table->text('artDesc', 1000);
            $table->string('artStatus')->nullable();
            $table->integer('artYear');
            $table->decimal('artWidth');
            $table->decimal('artHeight');
            $table->integer('views')->nullable();
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
        Schema::dropIfExists('art');
    }
}
