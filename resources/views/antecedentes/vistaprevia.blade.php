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

    {{-- final --}}
        @if(isset($antecedente_request))
        @switch($antecedente_request)
        @case('alcalde_concejal')
        @if(isset($municipio_request))
        @if($municipio_request !== 0 && $provincia_request !== 0 && $provincia_request !== 'Seleccionar provincia' &&
        $municipio_request !== '' && $antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request
        !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes.contenido')
        @endif
        @endif
        @break

        @case('gobernador')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes.contenido')
        @endif
        @break
        @case('asambleista_poblacion')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes.contenido')
        @endif
        @break
        @case('asambleista_territorio')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes.contenido')
        @endif
        @break
        @case('asambleistas_npioc')
        @if($antecedente_request !== 'Seleccionar tipo de antecedente' && $antecedente_request !== '')
        <a class="posicion_descargar btn btn-success"
            href="{{ route('buscador_antecedente.index',['download'=>'pdf', 'provincia'=>$provincia_request, 'municipioajax'=>$municipio_request, 'antecedente'=>$antecedente_request]) }}">Descargar
            PDF</a>
        @include('antecedentes.contenido')
        @endif
        @break
        <span>Seleccionar antecedente</span>
        @endswitch
        @endif
    {{-- end final --}}
</div>
</div>



@endsection
