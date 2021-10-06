@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">AGREGAR CANDIDATO</div>
        <div class="card-body">
          {!! Form::open(['route'=>'candidatos.store']) !!}
          @include('candidatos.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection