<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->foreignId('client_id')->references('client_id')->on('clients');
            $table->foreignId('platform_id')->references('platform_id')->on('platforms');
            $table->float('platform_rate');
            $table->foreignId('payment_id')->references('payment_id')->on('payments');
            $table->foreignId('plot_id')->references('plot_id')->on('plots');
            $table->float('plot_rate');
            $table->float('sale_price');
            $table->float('discount');
            $table->float('amount');
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
        Schema::dropIfExists('sales');
    }
}
