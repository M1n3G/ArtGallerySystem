<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('artist');
            $table->string('artworkName');
            $table->string('artworkImg');
            $table->string('artworkMedium');
            $table->string('artworkStyle');
            $table->float('artworkPrice');
            $table->string('artworkDesc');
            $table->integer('artworkStock');
            $table->string('artworkStatus')->nullable();
            $table->integer('artworkYear');
            $table->float('artworkWidth');
            $table->float('artworkHeight');
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
        Schema::dropIfExists('artworks');
    }
}
