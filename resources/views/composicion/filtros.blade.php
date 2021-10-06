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
    @endif

    @if($estado === "territorio")
    <form action="{{ route('buscador_composicion_territorio.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    @endif

    @if($estado === "poblacion")
    <form action="{{ route('buscador_composicion_poblacion.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    @endif

    @if($estado === "npioc")
    <form action="{{ route('buscador_composicion_npioc.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.buscar')
        </div>
    </form>
    @endif
</div>

@endsection
