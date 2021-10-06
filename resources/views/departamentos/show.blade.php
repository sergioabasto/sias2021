@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  DEPARTAMENTO
                </div>
                <div class="card-body">
                  <p><strong>Nombre Departamento: </strong> {{$departamento->NombreDepartamento}}</p>
                  @can('departamentos.index')
                    <a href="{{route('departamentos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
                    @endcan
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
