@extends('layouts.app')
@section('content')

<div class="container">
    @if($estado === "Alcaldia")
    <form action="{{ route('buscador_autoridad.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_municipio')
            @include('geografia.select_cargo')
            @include('geografia.select_titularidad')
            @include('geografia.buscar')
        </div>
    </form>
    @endif

    @if($estado === "npioc")
    <form action="{{ route('buscador_npioc.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_cargo')
            <br>
            @include('geografia.buscar')
        </div>
    </form>
    @endif

</div>

@endsection
