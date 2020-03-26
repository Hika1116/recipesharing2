<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepesprocessTable extends Migration
{
    /**
     * Recipe Process テーブルの作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipesprocess', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('recipe_order');
            $table->text('process_text');
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
        Schema::dropIfExists('recepesprocess');
    }
}
