@extends('layouts.app')
@section('content')
<div class="container">
    @if($estado === "alcaldia_concejal")
    <form action="{{ route('buscador_composicion.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_provincia')
            @include('geografia.select_municipio_ajax')
            @include('geografia.buscar')
        </div>
    </form>
    <div class="row" style="align:center">
        @if(isset($municipio_request))
        @if($municipio_request !== 0 && $provincia_request !== 0 && $provincia_request !== 'Seleccionar provincia' && $municipio_request !== '' && $autoridades->count()>0)
        <a class="posicion_descargar btn btn-success" href="{{ route('buscador_composicion.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request]) }}">Descargar PDF</a>
        @include('composicion.contenido')
        @endif
        @else
        @endif
    </div>
    @endif
    @if($estado === "territorio")
    <form action="{{ route('buscador_composicion_territorio.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    <div class="row" style="align:center">
        @if(isset($autoridades))
        @if($autoridades->count()>0)
        <a class="posicion_descargar btn btn-success" href="{{ route('buscador_composicion_territorio.index',['download'=>'pdf']) }}">Descargar PDF</a>
        @include('composicion.contenido')
        @endif
        @else
        @endif
    </div>
    @endif
    @if($estado === "poblacion")
    <form action="{{ route('buscador_composicion_poblacion.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    <div class="row" style="align:center">
        @if(isset($autoridades))
        @if($autoridades->count()>0)
        <a class="posicion_descargar btn btn-success" href="{{ route('buscador_composicion_poblacion.index',['download'=>'pdf']) }}">Descargar PDF</a>
        @include('composicion.contenido')
        @endif
        @else

        @endif
    </div>
    @endif
    @if($estado === "npioc")
    <form action="{{ route('buscador_composicion_npioc.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    <div class="row" style="align:center">
        @if(isset($autoridades))
        @if($autoridades->count()>0)
        <a class="posicion_descargar btn btn-success" href="{{ route('buscador_composicion_npioc.index',['download'=>'pdf']) }}">Descargar PDF</a>
        @include('composicion.contenido')
        @endif
        @else
        @endif
    </div>
    @endif
</div>
@endsection