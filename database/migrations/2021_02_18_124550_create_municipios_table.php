<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id('IdMunicipio');
            $table->string('NombreMunicipio');
            $table->integer('IdDepartamento')->unsigned()->nullable();
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos');
            $table->integer('IdProvincia')->unsigned()->nullable();
            $table->foreign('IdProvincia')->references('IdProvincia')->on('provincias');
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
        Schema::dropIfExists('municipios');
    }
}
