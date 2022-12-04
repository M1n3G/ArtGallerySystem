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
            $table->string('username');
            $table->string('artistName');
            $table->string('artName');
            $table->string('artImg', 255);
            $table->integer('category_id');
            $table->string('artStyle');
            $table->float('artPrice');
            $table->text('artDesc', 1000);
            $table->string('artStatus')->nullable();
            $table->integer('artYear');
            $table->decimal('artWidth')->nullable();
            $table->decimal('artHeight')->nullable();
            $table->dateTime('datetime');
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
