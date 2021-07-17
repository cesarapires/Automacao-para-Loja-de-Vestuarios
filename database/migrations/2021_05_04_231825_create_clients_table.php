<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('name', 50);
            $table->string('email',50)->nullable();
            $table->string('phone',15)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('cep',9)->nullable();
            $table->string('address',50)->nullable();
            $table->string('number',5)->nullable();
            $table->string('city',50)->nullable();
            $table->string('district',50)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('sex',1)->nullable();
            $table->string('cpf',14)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
