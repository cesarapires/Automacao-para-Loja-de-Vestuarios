<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivables', function (Blueprint $table) {
            $table->id('reciavable_id');
            $table->foreignId('client_id')->nullable()->references('client_id')->on('clients');
            $table->foreignId('sale_id')->nullable()->references('sale_id')->on('sales');
            $table->date('date_sell')->nullable();
            $table->date('date_paymentReceivable')->nullable();
            $table->char('status',2);
            $table->float('value');
            $table->date('dateDueReceivable');
            $table->foreignId('plot_id')->nullable()->references('plot_id')->on('plots');
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
        Schema::dropIfExists('receivables');
    }
}
