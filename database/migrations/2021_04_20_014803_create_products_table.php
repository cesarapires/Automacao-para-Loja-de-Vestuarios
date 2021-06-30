<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->char('url',51);
            $table->char('name',50);
            $table->char('color',30);
            $table->foreignId('type_id')->references('type_id')->on('types');
            $table->foreignId('size_id')->references('size_id')->on('sizes');
            $table->float('price_buy');
            $table->float('price_sell');
            $table->integer('stock');
            $table->char('visible',1);
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
        Schema::dropIfExists('products');
    }
}
