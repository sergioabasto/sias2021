@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Documentos
                </div>
                <div class="card-body">

                  <form class="" action="{{route('documentos.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('documentos.partials.form')
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
