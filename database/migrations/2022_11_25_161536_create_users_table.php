<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('userID')->unique()->primary();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email','75')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('contactNum', 255);
            $table->string('userImg', 255)->nullable();
            $table->text('about', 255)->nullable();
            $table->string('userRole')->nullable();
            $table->dateTime('datetime');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
