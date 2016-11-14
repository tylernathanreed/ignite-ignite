<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table)
        {
            // Identification
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['role_id', 'user_id'], 'PK_role_user_role_id_user_id');

            // Foreign Keys
            $table->foreign('role_id', 'FK_role_user_roles_role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id', 'FK_role_user_users_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::drop('role_user');
    }
}
