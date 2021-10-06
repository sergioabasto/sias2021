@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR PROVINCIAS</div>
        <div class="card-body">
          {!! Form::model($provincia, ['route'=>['provincias.update',$provincia->IdProvincia],'method'=>'PUT' ]) !!}
          @include('provincias.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection