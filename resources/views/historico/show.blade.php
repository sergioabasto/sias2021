@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  AUTORIDADES
                </div>
                <div class="card-body">
                  <p><strong>OBSEVACION:</strong> {{$autoridad->Obsevaciones}}</p>
                  <p><strong>FECHA DE SOLICITUD:</strong> {{$autoridad->FechaSolicitud}}</p>
                  <p><strong>FECHA DE RESPUESTA:</strong> {{$autoridad->FechaRespuesta}}</p>
                  <p><strong>ESTA HABILITADO: </strong> {{$autoridad->IsHabilitado}}</p>
                  <p><strong>DETALLE DE HABILITACION:</strong> {{$autoridad->DetalleIsHabilitado}}</p>
                  <p><strong>ID CANDIDATO:</strong> {{$autoridad->IdCandidato}}</p>
                  <p><strong>CARGO: </strong> {{$autoridad->IdCargo}}</p>
                  <p><strong>ESTA ACTIVO:</strong> {{$autoridad->IsActivo}}</p>
                </div>
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                 Launch demo modal
            </button>

  <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>OBSEVACION:</strong> {{$autoridad->Obsevaciones}}</p>
                            <p><strong>FECHA DE SOLICITUD:</strong> {{$autoridad->FechaSolicitud}}</p>
                            <p><strong>FECHA DE RESPUESTA:</strong> {{$autoridad->FechaRespuesta}}</p>
                            <p><strong>ESTA HABILITADO: </strong> {{$autoridad->IsHabilitado}}</p>
                            <p><strong>DETALLE DE HABILITACION:</strong> {{$autoridad->DetalleIsHabilitado}}</p>
                            <p><strong>ID CANDIDATO:</strong> {{$autoridad->IdCandidato}}</p>
                            <p><strong>CARGO: </strong> {{$autoridad->IdCargo}}</p>
                            <p><strong>ESTA ACTIVO:</strong> {{$autoridad->IsActivo}}</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
