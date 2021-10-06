@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR NACIÓN Y PUEBLO INDIGENA</div>
        <div class="card-body">
          {!! Form::model($nacion, ['route'=>['nacions.update',$nacion->IdNacion],'method'=>'PUT' ]) !!}
          @include('nacions.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection