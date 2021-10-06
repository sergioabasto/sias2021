@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR CARGO</div>
        <div class="card-body">
          {!! Form::model($cargo, ['route'=>['cargos.update',$cargo->IdCargo],'method'=>'PUT' ]) !!}
          @include('cargos.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection