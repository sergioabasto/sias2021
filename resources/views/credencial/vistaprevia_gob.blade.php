@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('buscador_gobernacion.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_provincia')
            @include('geografia.select_cargo')
            @include('geografia.select_titularidad')
            @include('geografia.buscar')
        </div>
    </form>

<div class="row" style="align:center">
    @if(isset($provincia_request))
    @if($cargo_request !== 'Seleccionar cargo' && $titularidad_request !== 'Seleccionar titularidad' && $consejales->count()>0)

    <a class="posicion_descargar btn btn-success"
        href="{{ route('buscador_gobernacion.index',['download'=>'pdf', 'cargo'=>$cargo_request, 'provincia'=>$provincia_request, 'titularidad'=>$titularidad_request]) }}">Descargar
        PDF</a>
    @endif
    @else
    {{-- <a class="posicion_descargar btn btn-success" href="{{ route('buscador_autoridad.index',['download'=>'pdf']) }}">Descargar
        PDF</a> --}}
    @endif
</div>
</div>

@foreach ($consejales as $consejal)
<div class="margen_estatico">

</div>
<div class="page-break p-10 ancho_pagina" style="">
    @include('credencial.contenido')
</div>
@endforeach
@endsection
