<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table)
        {
            // Identification
            $table->increments('id', 'PK_permissions_id');

            // Attributes
            $table->string('display_name', 50);
            $table->string('system_name', 50)->unique('UX_permissions_system_name');

            $table->string('system_group', 50);

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
        Schema::drop('permissions');
    }
}
