@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR CANDIDATO</div>
        <div class="card-body">
          {!! Form::model($candidato, ['route'=>['candidatos.update',$candidato->IdCandidato],'method'=>'PUT' ]) !!}
          @include('candidatos.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection