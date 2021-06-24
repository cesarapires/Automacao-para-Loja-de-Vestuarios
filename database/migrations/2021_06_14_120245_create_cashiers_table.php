<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id('cashier_id');
            $table->char('description',50);
            $table->foreignId('payable_id')->nullable()->references('payable_id')->on('payables');
            $table->foreignId('client_id')->nullable()->references('client_id')->on('clients');
            $table->foreignId('sale_id')->nullable()->references('sale_id')->on('sales');
            $table->foreignId('payment_id')->nullable()->references('payment_id')->on('payments');
            $table->foreignId('receivable_id')->nullable()->references('receivable_id')->on('receivables');
            $table->date('date_receivable')->nullable();
            $table->char('type',2);
            $table->float('value');
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
        Schema::dropIfExists('cashiers');
    }
}