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
                  <p><strong>Nombre Candidato:</strong> {{$gaceta->nombre}}</p>
                  <p><strong> </strong> {{$gaceta->descripcion}}</p>
                  @foreach ($nuevos as $item)
                      @if($item->id == $gaceta->gacetamunicipal_id)
                      <p><strong>Tipo de Gaceta Municipal: </strong> {{$item->tipoGaceta}}</p>
                      @endif
                  @endforeach

                  <p><strong>Documento digital: </strong>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal{{$gaceta->id}}">
                      Documento Digital Actual
                    </button>
                  </p>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$gaceta->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">{{$gaceta->nombre}}</h5>
                        </div>
                        <div class="modal-body">
                          <embed src="{{asset('storage'.'/'.$gaceta->archivo)}}" type="application/pdf" width="100%" height="600px" />
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
