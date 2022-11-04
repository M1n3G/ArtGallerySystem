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
            $table->string('contactNum', 255);
            $table->string('userImg', 255)->nullable();
            $table->text('about', 255)->nullable();
            $table->string('userAddress', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('postcode', 255)->nullable();
            $table->string('userRole')->nullable();
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
