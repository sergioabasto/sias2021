@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Organizacion Politica
                </div>
                <div class="card-body">

                  {!! Form::model($organizacionpolitica, ['route'=>['organizacionpoliticas.update',$organizacionpolitica->IdOrganizacionPolitica],'method'=>'PUT' ]) !!}
                  @include('organizacionpoliticas.partials.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
