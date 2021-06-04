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
            $table->float('payment_rate_fix')->nullable();
            $table->float('payment_rate_variable')->nullable();
            $table->float('payment_rate_month')->nullable();   
            $table->foreignId('plot_id')->nullable()->references('plot_id')->on('plots');         
            $table->float('rate_client_plot')->nullable();
            $table->float('rate_company_plot')->nullable();
            $table->integer('shipping_id')->nullable();
            $table->float('price_shipping')->nullable();
            $table->float('discount')->nullable();
            $table->float('subtotalitens')->nullable();
            $table->float('price_sale')->nullable();
            $table->float('rate_total')->nullable();
            $table->float('amount')->nullable();
            $table->char('status');
            $table->timestamps();
        });
        DB::table('sales')->insert([
            'client_id'=>null,
            'platform_id'=>null,
            'platform_rate'=>0,
            'payment_id'=>null,
            'payment_rate_fix'=>0,
            'payment_rate_variable'=>0,
            'payment_rate_month'=>0,
            'plot_id'=>null,
            'rate_client_plot'=>0,
            'rate_company_plot'=>0,
            'shipping_id'=>null,
            'price_shipping'=>0,
            'discount'=>0,
            'subtotalitens'=>0,
            'price_sale'=>0,
            'rate_total'=>0,
            'amount'=>0,
            'status'=>0,
            'created_at' => date("Y-m-d H:i:s"),
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
