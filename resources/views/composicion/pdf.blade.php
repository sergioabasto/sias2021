{{-- @extends('credencial.head') --}}
{{-- @section('content') --}}
@if($estado === "alcaldia_concejal")
@include('composicion.contenido_print')
@endif

@if($estado === "territorio")
@include('composicion.contenido_print')
@endif

@if($estado === "poblacion")
@include('composicion.contenido_print')
@endif

@if($estado === "npioc")
@include('composicion.contenido_print')
@endif

@include('credencial.css')
@include('composicion.css')

{{-- @endsection --}}
