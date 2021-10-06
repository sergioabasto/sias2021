@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">AGREGAR AUTORIDADES</div>
        <div class="card-body">
          <!-- <form class="" action="{{route('autoridads.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @include('autoridads.partials.form')
            </form> -->
          {!! Form::open(['route'=>'autoridads.store']) !!}
          @include('autoridads.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection