<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('form_id');
            $table->string('reg_code')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();  //mail verificaion
            $table->string('role')->default('student'); // role column
            $table->string('avatar')->default('user.jpg');// for profile_pic column
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the   migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
