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
</div>

@endsection
