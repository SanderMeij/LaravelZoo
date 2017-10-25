<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('habitat');
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->string('animal_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cages');
    }
}
