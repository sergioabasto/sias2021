@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR ROL</div>
        <div class="card-body">
          {!! Form::model($role, ['route'=>['roles.update',$role->id],'method'=>'PUT' ]) !!}
          @include('roles.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection