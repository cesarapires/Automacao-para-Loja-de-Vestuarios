<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->foreignId('client_id')->nullable()->references('client_id')->on('clients');
            $table->foreignId('platform_id')->nullable()->references('platform_id')->on('platforms');
            $table->float('platform_rate')->nullable();
            $table->foreignId('payment_id')->nullable()->references('payment_id')->on('payments');
            $table->float('rate_payment')->nullable();
            $table->float('fixrate_payment')->nullable();
            $table->integer('shipping_id')->nullable();
            $table->float('shipping')->nullable();
            $table->float('ratevariable_payment')->nullable();
            $table->foreignId('plot_id')->nullable()->references('plot_id')->on('plots');
            $table->float('sale_price')->nullable();
            $table->float('discount')->nullable();
            $table->float('amount')->nullable();
            $table->timestamps();
        });
        DB::table('sales')->insert([
            'client_id'=>null,
            'platform_id'=>null,
            'platform_rate'=>0,
            'payment_id'=>null,
            'rate_payment'=>0,
            'fixrate_payment'=>0,
            'shipping_id'=>null,
            'shipping'=>0,
            'ratevariable_payment'=>0,
            'plot_id'=>null,
            'sale_price'=>0,
            'discount'=>0,
            'amount'=>0,
            'created_at' => date("Y-m-d H:i:s")
        ]);
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
