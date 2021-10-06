@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('buscador_npioc.index') }}" method="GET" role="search">
        <div class="row">
            @include('geografia.select_cargo')
            @include('geografia.buscar')
        </div>
    </form>

<div class="row" style="align:center">
    @if(isset($consejales))
        @if($cargo_request !== 'Seleccionar cargo' && $consejales->count()>0)
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_npioc.index',['download'=>'pdf', 'cargo'=>$cargo_request]) }}">
            Descargar PDF
        </a>
        @endif
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
