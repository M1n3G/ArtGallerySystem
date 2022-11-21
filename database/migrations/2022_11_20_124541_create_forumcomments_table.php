<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumcomments', function (Blueprint $table) {
            $table->id();
            $table->integer('postID');
            $table->integer('category_id');
            $table->integer('replies_id')->nullable();
            $table->string('username');
            $table->text('comment_body');
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
        Schema::dropIfExists('forumcomments');
    }
}
