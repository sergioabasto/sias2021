@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  DETALLE DE PROVINCIA
                </div>
                <div class="card-body">
                     <p><strong>NOMBRE PROVINCIA:</strong> {{$provincia->NombreProvincia}}</p>
                  @foreach ($departamentos as $departamento )
                    @if($departamento->IdDepartamento== $provincia->IdDepartamento)
                        <p><strong>DEPARTAMENTO:</strong> {{$departamento->NombreDepartamento}}</p>
                     @endif
                  @endforeach

                  @can('provincias.index')
                    <a href="{{route('provincias.index')}}" class="btn btn-sm btn-primary">Regresar</a>
                @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
