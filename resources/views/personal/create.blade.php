@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 AUTORIDADES DEL PERSONAL TED
                </div>
                <div class="card-body">

                  {!! Form::open(['route'=>'personalteds.store']) !!}
                  @include('personal.partials.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
