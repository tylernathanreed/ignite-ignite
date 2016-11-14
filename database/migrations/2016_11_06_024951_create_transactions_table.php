<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table)
        {
            // Identification
            $table->increments('id', 'PK_transactions_id');

            // Relationships
            $table->integer('account_id')->unsigned()->index('IX_transactions_account_id');
            $table->foreign('account_id', 'FK_transactions_accounts_account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');

            // Attributes
            $table->date('charged_at');
            $table->integer('amount')->unsigned();
            $table->string('description', 255)->nullable();
            $table->string('original_description', 255)->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
