@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  DETALLES DEL MUNICIPIO
                </div>
                <div class="card-body">
                  <p><strong>NOMBRE MUNICIPIO:</strong> {{$municipio->NombreMunicipio}}</p>
                   @foreach ($departamentos as $departamento )
                    @if($departamento->IdDepartamento == $municipio->IdDepartamento)
                    <p><strong>NOMBRE DEPARTAMENTO: </strong> {{$departamento->NombreDepartamento}}</p>
                    @endif
                    @endforeach
                  @foreach ($provincias as $provincia )
                     @if($provincia->IdProvincia == $municipio->IdProvincia)
                  <p><strong>NOMBRE PROVINCIA:</strong> {{$provincia->NombreProvincia}}</p>
                  @endif
                  @endforeach
@can('municipios.index')
<a href="{{route('municipios.index')}}" class="btn btn-sm btn-primary">REGRESAR</a>
@endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
