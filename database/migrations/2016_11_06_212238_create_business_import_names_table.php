<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessImportNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_import_names', function (Blueprint $table)
        {
            // Identification
            $table->increments('id', 'PK_business_import_names_id');

            // Relations
            $table->integer('business_id')->unsigned();
            $table->foreign('business_id', 'FK_business_import_names_businesses_business_id')->references('id')->on('businesses')->onUpdate('cascade')->onDelete('cascade');

            // Attributes
            $table->string('import_name', 50);

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
        Schema::dropIfExists('business_import_names');
    }
}
