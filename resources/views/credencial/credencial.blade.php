@extends('credencial.head')
@section('content')
@foreach ($consejales as $consejal)
<div class="margen_estatico">

</div>
<div class="page-break p-10 ancho_pagina_print" style="">
    @include('credencial.contenido')
    @include('credencial.css')
</div>
@endforeach
@endsection
