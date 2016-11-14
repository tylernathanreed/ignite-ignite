<?php

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
        Schema::create('users', function (Blueprint $table)
        {
            // Identification
            $table->increments('id', 'PK_users_id');

            // Authentication
            $table->string('username', 30)->unique('UX_users_username');
            $table->string('password', 60);
            $table->rememberToken();

            // Attributes
            $table->string('name', 70);
            
            // Revision Tracking
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
        Schema::drop('users');
    }
}
