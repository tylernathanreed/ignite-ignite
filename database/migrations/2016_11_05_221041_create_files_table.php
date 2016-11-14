<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table)
        {
            // Identification
            $table->increments('id');

            // Attributes
            $table->string('display_name', 255);
            $table->string('path', 255);
            $table->integer('size')->unsigned();
            $table->string('extension', 10);
            $table->string('mime', 50);

            // Timestamps
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
        Schema::dropIfExists('files');
    }
}
