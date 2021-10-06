@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('buscador_antecedente.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_antecedente')
            @include('geografia.select_provincia')
            @include('geografia.select_municipio_ajax')
            @include('geografia.buscar')
        </div>
    </form>
</div>

@endsection
