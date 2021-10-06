@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  DETALLES DEL CANDIDATO
                </div>
                <div class="card-body">
                  <p><strong>NOMBRES:</strong> {{$candidato->Nombres}}</p>
                  <p><strong>APELLIDO PATERNO </strong> {{$candidato->PrimerApellido}}</p>
                  <p><strong>APELLIDO MATERNO:</strong> {{$candidato->SegundoApellido}}</p>
                  <p><strong>DOCUMENTO IDENTIDAD: </strong> {{$candidato->DocumentoIdentidad}}</p>
                  <p><strong>COMPLEMENTO SEGIP:</strong> {{$candidato->ComplementoSegip}}</p>
                  <p><strong>LUGAR EXPEDIDO:</strong> {{$candidato->LugarExpedido}}</p>
                  <p><strong>GENERO: </strong> {{$candidato->Genero}}</p>
                  <p><strong>DIRECCION:</strong> {{$candidato->Direccion}}</p>
                  <p><strong>TELEFONO: </strong> {{$candidato->Telefono}}</p>
                  <p><strong>FECHA DE NACIMIENTO CARGO:</strong> {{$candidato->FechaNacimiento}}</p>

                  <p><strong>CARGO: </strong> {{$cargo->NombreCargo}} {{$cargo->Titularidad}} ({{$cargo->Posicion}})</p>
                  <p><strong>ORGANIZACION POLITICA:</strong> {{$organizacionpolitica->NombreOrganizacion}}</p>
                  <p><strong>PROCESO ELECTORAL: </strong> {{$procesoelectoral->DetalleProceso}}</p>
                  <p><strong>NOMBRE DEPARTAMENTO: </strong> {{$departamento->NombreDepartamento}}</p>
                  <p><strong>NOMBRE PROVINCIA:</strong> {{$provincia->NombreProvincia}}</p>
                  <p><strong>MUNICIPIO:</strong> {{$municipio->NombreMunicipio}}</p>

<p><strong>NOMBRES:</strong> {{$item->Nombres}}</p>
<p><strong>APELLIDO PATERNO </strong> {{$item->PrimerApellido}}</p>
<p><strong>APELLIDO MATERNO:</strong> {{$item->SegundoApellido}}</p>
<p><strong>DOCUMENTO IDENTIDAD: </strong> {{$item->DocumentoIdentidad}}</p>
<p><strong>COMPLEMENTO SEGIP: </strong> {{$item->ComplementoSegip}}</p>
<p><strong>LUGAR EXPEDIDO: </strong> {{$item->LugarExpedido}}</p>
<p><strong>GENERO: </strong> {{$item->Genero}}</p>
<p><strong>DIRECCION: </strong> {{$item->Direccion}}</p>
<p><strong>TELEFONO: </strong> {{$item->Telefono}}</p>
<p><strong>FECHA DE NACIMIENTO CARGO: </strong> {{$item->FechaNacimiento}}</p>
<p><strong>CARGO: </strong> {{$item->NombreCargo}} {{$item->Titularidad}} ({{$item->Posicion}})</p>
<p><strong>ORGANIZACION POLITICA:</strong> {{$item->NombreOrganizacion}}</p>
<p><strong>PROCESO ELECTORAL: </strong> {{$item->DetalleProceso}}</p>
<p><strong>NOMBRE DEPARTAMENTO: </strong> {{$item->NombreDepartamento}}</p>
<p><strong>NOMBRE PROVINCIA:</strong> {{$item->NombreProvincia}}</p>
<p><strong>MUNICIPIO:</strong> {{$item->NombreMunicipio}}</p>







                  @foreach ($cargos as $cargo)
                    @if($candidato->IdCargo == $cargo->IdCargo)
                        <p><strong>CARGO: </strong> {{$cargo->NombreCargo}} {{$cargo->Titularidad}} ({{$cargo->Posicion}})</p>
                        @endif
                  @endforeach

                @foreach ( $organizacionpoliticas as $organizacionpolitica)
                    @if ($candidato->IdOrganizacionPolitica == $organizacionpolitica->IdOrganizacionPolitica )
                        <p><strong>ORGANIZACION POLITICA:</strong> {{$organizacionpolitica->NombreOrganizacion}}</p>
                    @endif
                @endforeach
                @foreach ( $procesoelectorals as $procesoelectoral )
                    @if ($candidato->IdProcesoElectoral == $procesoelectoral->IdProcesoElectoral)
                        <p><strong>PROCESO ELECTORAL: </strong> {{$procesoelectoral->DetalleProceso}}</p>
                    @endif
                @endforeach
                  @foreach ($departamentos as $departamento )
                   @if($candidato->IdDepartamento == $departamento->IdDepartamento)
                   <p><strong>NOMBRE DEPARTAMENTO: </strong> {{$departamento->NombreDepartamento}}</p>
                   @endif
                   @endforeach
                 @foreach ($provincias as $provincia )
                    @if($candidato->IdProvincia == $provincia->IdProvincia)
                 <p><strong>NOMBRE PROVINCIA:</strong> {{$provincia->NombreProvincia}}</p>
                 @endif
                 @endforeach
                  @foreach ($municipios as $municipio )
                    @if($candidato->IdMunicipio == $municipio->IdMunicipio)
                        <p><strong>MUNICIPIO:</strong> {{$municipio->NombreMunicipio}}</p>
                    @endif
                 @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
