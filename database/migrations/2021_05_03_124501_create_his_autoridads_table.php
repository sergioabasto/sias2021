<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHisAutoridadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('his_autoridads', function (Blueprint $table) {
            $table->id('IdHistorico');
            $table->integer('HisIdAutoridad');
            $table->string('HisDocumentoAdjunto')->nullable();
            $table->text('HisObservaciones')->nullable();
            $table->date('HisFechaSolicitud')->nullable();
            $table->date('HisFechaRespuesta')->nullable();
            $table->date('HisFechaIngresoTic')->nullable();
            $table->enum('HisIsHabilitado', array('Habilitado', 'InHabilitado'));
            $table->text('HisDetalleIsHabilitado')->nullable();
            $table->integer('HisIdCandidato')->nullable();
            $table->integer('HisIdCargo')->nullable();
            $table->string('HisIdDocumento')->nullable();
            $table->enum('HisIsActivo', array('si', 'no'))->nullable();
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
        Schema::dropIfExists('his_autoridads');
    }
}
