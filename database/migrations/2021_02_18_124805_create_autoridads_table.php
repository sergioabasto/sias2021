<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoridadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoridads', function (Blueprint $table) {
            $table->id('IdAutoridad');
            $table->string('DocumentoAdjunto')->nullable();
            $table->text('Observaciones')->nullable();
            $table->date('FechaSolicitud')->nullable();
            $table->date('FechaRespuesta')->nullable();
            $table->enum('IsHabilitado', array('Habilitado', 'InHabilitado'));
            $table->text('DetalleIsHabilitado')->nullable();// Resolucion
            $table->integer('IdCandidato')->unsigned();
            $table->foreign('IdCandidato')->references('IdCandidato')->on('candidatos');
            $table->integer('IdCargo')->unsigned()->nullable();
            $table->foreign('IdCargo')->references('IdCargo')->on('cargos');
            $table->string('IdDocumento')->nullable();
            $table->enum('IsActivo', array('si', 'no'))->nullable();
            $table->timestamps();
            $table->date('FechaIngresoTic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoridads');
    }
}
