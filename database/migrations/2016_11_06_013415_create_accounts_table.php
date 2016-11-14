<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table)
        {
            // Identification
            $table->increments('id');

            // References
            $table->integer('payor_id')->unsigned()->index('IX_accounts_payor_id');
            $table->foreign('payor_id', 'FK_accounts_payors_payor_id')->references('id')->on('payors')->onUpdate('cascade')->onDelete('cascade');

            // Attributes
            $table->string('name', 50);
            $table->string('number', 4);
            $table->string('type', 20);

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
        Schema::dropIfExists('accounts');
    }
}
