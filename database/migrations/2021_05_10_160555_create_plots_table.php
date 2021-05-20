<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id('plot_id');
            $table->integer('number');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('plots')->insert([
            'name'=>"À vista",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>0
        ]);
        DB::table('plots')->insert([
            'name'=>"1x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>1
        ]);
        DB::table('plots')->insert([
            'name'=>"2x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>2
        ]);
        DB::table('plots')->insert([
            'name'=>"3x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>3
        ]);
        DB::table('plots')->insert([
            'name'=>"4x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>4
        ]);
        DB::table('plots')->insert([
            'name'=>"5x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>5
        ]);
        DB::table('plots')->insert([
            'name'=>"6x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>6
        ]);
        DB::table('plots')->insert([
            'name'=>"7x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>7
        ]);
        DB::table('plots')->insert([
            'name'=>"8x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>8
        ]);
        DB::table('plots')->insert([
            'name'=>"9x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>9
        ]);
        DB::table('plots')->insert([
            'name'=>"10x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>10
        ]);
        DB::table('plots')->insert([
            'name'=>"11x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>11
        ]);
        DB::table('plots')->insert([
            'name'=>"12x",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'number'=>12
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plots');
    }
}
