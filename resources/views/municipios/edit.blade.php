@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR MUNICIPIO</div>
        <div class="card-body">
          {!! Form::model($municipio, ['route'=>['municipios.update',$municipio->IdMunicipio],'method'=>'PUT' ]) !!}
          @include('municipios.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection