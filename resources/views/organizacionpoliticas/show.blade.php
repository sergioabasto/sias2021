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
                     <p><strong>NOMBRE ORGANIZACIÓN:</strong> {{$organizacionpolitica->NombreOrganizacion}}</p>
                  <p><strong>SIGLA ORGANIZACIÓN:</strong> {{$organizacionpolitica->Sigla}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
