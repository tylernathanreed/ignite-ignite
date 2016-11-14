<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table)
        {
            // Identification
            $table->integer('permission_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['permission_id', 'user_id'], 'PK_permission_user_permission_id_user_id');

            // Foreign Keys
            $table->foreign('permission_id', 'FK_permission_user_permissions_permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id', 'FK_permission_user_users_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            // Attributes
            $table->boolean('is_addition');

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
        Schema::drop('permission_user');
    }
}
