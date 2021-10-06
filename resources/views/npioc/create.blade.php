@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">AGREGAR CANDIDATO NPIOC</div>
        <div class="card-body">
          {!! Form::open(['route'=>'npiocs.store']) !!}
          @include('npioc.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection