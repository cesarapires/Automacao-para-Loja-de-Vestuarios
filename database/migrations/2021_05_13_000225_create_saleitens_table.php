<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleitensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleitens', function (Blueprint $table) {
            $table->id('saleitens_id');
            $table->foreignId('sale_id')->references('sale_id')->on('sales');
            $table->foreignId('product_id')->references('product_id')->on('products');
            $table->integer('quantity');
            $table->float('price');
            $table->float('subtotal');
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
        Schema::dropIfExists('saleitens');
    }
}
