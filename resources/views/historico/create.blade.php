@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Autoridades
                </div>
                <div class="card-body">

                  <form class="" action="{{route('autoridads.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('autoridads.partials.form')
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
