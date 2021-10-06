<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircunscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circunscripcions', function (Blueprint $table) {
            $table->id('IdCircunscripcion');
            $table->string('Circunscripcion');
            $table->integer('IdDepartamento')->unsigned()->nullable();
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos');
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
        Schema::dropIfExists('circunscripcions');
    }
}
