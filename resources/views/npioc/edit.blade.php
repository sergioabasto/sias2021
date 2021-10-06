@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR CANDIDATO NPIOC</div>
        <div class="card-body">
          {!! Form::model($npioc, ['route'=>['npiocs.update',$npioc->IdCandidato],'method'=>'PUT' ]) !!}
          @include('npioc.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection