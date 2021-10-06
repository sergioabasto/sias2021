@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  CARGO
                </div>
                <div class="card-body">
                  <p><strong>NOMBRES:</strong> {{$npioc->Nombres}}</p>
                  <p><strong>APELLIDO PATERNO </strong> {{$npioc->PrimerApellido}}</p>
                  <p><strong>APELLIDO MATERNO:</strong> {{$npioc->SegundoApellido}}</p>
                  <p><strong>DOCUMENTO IDENTIDAD: </strong> {{$npioc->DocumentoIdentidad}}</p>
                  <p><strong>COMPLEMENTO SEGIP:</strong> {{$npioc->ComplementoSegip}}</p>
                  <p><strong>LUGAR EXPEDIDO:</strong> {{$npioc->LugarExpedido}}</p>
                  <p><strong>GENERO: </strong> {{$npioc->Genero}}</p>
                  <p><strong>DIRECCION:</strong> {{$npioc->Direccion}}</p>
                  <p><strong>TELEFONO: </strong> {{$npioc->Telefono}}</p>
                  <p><strong>FECHA DE NACIMIENTO CARGO:</strong> {{$npioc->FechaNacimiento}}</p>
                  <p><strong>ESTA ELECTO:</strong> {{$npioc->IsElecto}}</p>
                  <p><strong>CARGO: </strong> {{$npioc->IdCargo}}</p>
                  <p><strong>ORGANIZACION POLITICA:</strong> {{$npioc->IdOrganizacionPolitica}}</p>
                  <p><strong>PROCESO ELECTORAL: </strong> {{$npioc->IdProcesoElectoral}}</p>
                  <p><strong>DEPARTAMENTO:</strong> {{$npioc->IdDepartamento}}</p>
                  <p><strong>PROVINCIA: </strong> {{$npioc->IdProvincia}}</p>
                  <p><strong>MUNICIPIO:</strong> {{$npioc->IdMunicipio}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
