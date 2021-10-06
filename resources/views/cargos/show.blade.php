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
                  <p><strong>AMBITO:</strong> {{$cargo->Ambito}}</p>
                  <p><strong>NOMBRE CARGO: </strong> {{$cargo->NombreCargo}}</p>
                  <p><strong>TITULARIDAD:</strong> {{$cargo->Titularidad}}</p>
                  <p><strong>POSICION: </strong> {{$cargo->Posicion}}</p>
                  <p><strong>DETALLE CARGO:</strong> {{$cargo->DetalleCargo}}</p>
                    @can('cargos.index')
<a href="{{route('cargos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
@endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
