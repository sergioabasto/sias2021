@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar resolución
                </div>
                <div class="card-body">
                    {!! Form::model($resolucion_credencials, ['route'=>['resolucion.update',$resolucion_credencials->IdResolucionCredencial],'method'=>'PUT'
                    ]) !!}

                    <div class="form-row">

                        <div class="form-group">
                            {!! Form::label('Descripcion','Descripción') !!}
                            {!! Form::textArea('Descripcion', null, ['class'=> 'form-control','rows'=>'3']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
