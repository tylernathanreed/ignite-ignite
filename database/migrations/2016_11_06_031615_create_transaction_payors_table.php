<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionPayorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_payors', function (Blueprint $table)
        {
            // Identification
            $table->integer('transaction_id')->unsigned();
            $table->integer('payor_id')->unsigned();

            $table->primary(['transaction_id', 'payor_id'], 'PK_transaction_payors_transaction_id_payor_id');
            $table->foreign('transaction_id', 'FK_transaction_payors_transactions_transaction_id')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payor_id', 'FK_transaction_payors_payors_payor_id')->references('id')->on('payors')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('transaction_payors');
    }
}
