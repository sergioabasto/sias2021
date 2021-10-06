<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpiocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('npiocs', function (Blueprint $table) {
            $table->id('IdCandidato');
            $table->string('Nombres')->nullable();
            $table->string('PrimerApellido')->nullable();
            $table->string('SegundoApellido')->nullable();
            $table->string('DocumentoIdentidad')->nullable();
            $table->string('ComplementoSegip')->nullable();
            $table->string('LugarExpedido')->nullable();
            $table->string('Genero')->nullable();
            $table->string('Direccion')->nullable();
            $table->string('Telefono')->nullable();
            $table->date('FechaNacimiento')->nullable();
            $table->enum('IsElecto', array('si', 'no'));
            $table->integer('IdCargo')->unsigned()->nullable();
            $table->foreign('IdCargo')->references('IdCargo')->on('cargos');
            $table->integer('IdOrganizacionPolitica')->unsigned();
            $table->foreign('IdOrganizacionPolitica')->references('IdOrganizacionPolitica')->on('organizacion_politicas');
            //$table->integer('IdProcesoElectoral')->unsigned();
            //$table->foreign('IdProcesoElectoral')->references('IdProcesoElectoral')->on('proceso_electorals');
            $table->integer('IdDepartamento')->unsigned();
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos');
            $table->integer('IdProvincia')->unsigned()->nullable();
            $table->foreign('IdProvincia')->references('IdProvincia')->on('provincias');
            $table->integer('IdMunicipio')->unsigned()->nullable();
            $table->foreign('IdMunicipio')->references('IdMunicipio')->on('municipios');
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
        Schema::dropIfExists('npiocs');
    }
}
