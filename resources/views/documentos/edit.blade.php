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

                  {!! Form::model($documento, ['route'=>['documentos.update',$documento->IdDocumento],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal{{$documento->IdDocumento}}">
                    Documento Digital Actual
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$documento->IdDocumento}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">{{$documento->IdDocumento}}</h5>
                        </div>
                        <div class="modal-body">
                          <embed src="{{asset('storage'.'/'.$documento->Documento)}}" type="application/pdf" width="100%" height="600px" />
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    {!! Form::label('DocumentoDescripcion','DocumentoDescripcion') !!}
                    {!! Form::textArea('DocumentoDescripcion', null, ['class'=> 'form-control','rows'=>'3']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('Documento','Documento') !!}
                    {!! Form::file('Documento', null, ['class'=> 'form-control']) !!}
                  </div>

                  <div class="form-group">
                  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
