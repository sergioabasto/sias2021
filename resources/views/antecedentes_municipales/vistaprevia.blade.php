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
    <div class="row" style="align:center">
        {{-- {{dd($antecedente_request)}} --}}
        @if(isset($antecedente_request))
        @switch($antecedente_request)
        @case('municipal')
        @if($municipio_request !== 0 && $provincia_request !== 0 && $provincia_request !== 'Seleccionar provincia' &&
        $municipio_request !== '' && $antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request
        !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes_municipales.contenido')
        @endif
        @break

        @case('gubernamental')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes_municipales.contenido')
        @endif
        @break
        @case('poblacional')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes_municipales.contenido')
        @endif
        @break
        @case('territorial')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes_municipales.contenido')
        @endif
        @break
        @case('npiocal')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes_municipales.contenido')
        @endif
        @break
        <span>Seleccionar antecedente</span>
        @endswitch
        @endif
    </div>
</div>



@endsection
