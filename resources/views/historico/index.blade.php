@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-white">Historial Cambios y autoridades</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="hisautoridads">
                        <thead>
                            <tr class="grid">
                                <th scope="col">AUTORIDAD</th>
                                <th scope="col">CARGO</th>
                                <th scope="col">FECHA SOLICITUD</th>
                                <th scope="col">FECHA RESPUESTA</th>
                                <th scope="col">ESTA HABILITADO</th>
                                <th scope="col">RESOLUCIÓN</th>
                                <th scope="col">MOSTRAR</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" defer>
    $(document).ready(function() {
        var table = $('#hisautoridads').DataTable({
            processing: true,
            serverSide: false,
            "language": {
                "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
            },
            "order": [
                [0, "asc"]
            ],
            ajax: "{{ route('historico.index') }}",
            columns: [{
                    data: 'Nombres',
                    name: 'Nombres',
                    render: function(data, type, row) {
                        var formatted = row.Nombres + " " + row.PrimerApellido + " " + row.SegundoApellido;
                        return formatted
                    }
                },
                {
                    data: 'NombreCargo',
                    name: 'NombreCargo',
                    render: function(data, type, row) {
                        var formatted = row.NombreCargo + " " + row.Titularidad + " " + row.Posicion;
                        return formatted
                    }
                },
                {
                    data: 'HisFechaSolicitud',
                    name: 'HisFechaSolicitud'
                },
                {
                    data: 'HisFechaRespuesta',
                    name: 'HisFechaRespuesta'
                },
                {
                    data: 'HisIsHabilitado',
                    name: 'HisIsHabilitado'
                },
                {
                    data: 'IdHistorico',
                    name: 'IdHistorico',
                    render: function(data, type, row) {
                        var ida = row.IdHistorico;
                        var idocu = row.HisDocumentoAdjunto;
                        var result =
                            "<button type='button' class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#modal_ida'>Resolución</button>" +
                            "<div class='modal fade' id='modal" + row.IdHistorico +
                            "' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-hidden='true'>" +
                            "<div class='modal-dialog modal-xl'>" +
                            "<div class='modal-content'>" +
                            "<div class='modal-header'>" +
                            "<h5 class='modal-title' id='staticBackdropLabel'>Resolución</h5>" +
                            "</div>" +
                            "<div class='modal-body'>" +
                            "<embed src='{{asset('storage'.'/'.'_idocu')}}' type='application/pdf' width='100%' height='600px' />" +
                            "</div>" +
                            "<div class='modal-footer'>" +
                            "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                        var url = result.replace('_ida', ida);
                        url = url.replace('_idocu', idocu);
                        console.log(url);
                        return url;
                    }
                },
                {
                    data: 'IdHistorico',
                    name: 'IdHistorico',
                    render: function(data, type, row) {
                        var ida = row.IdHistorico;
                        var result =
                            "<button  type='button' class='btn btn-sm btn-success' data-toggle='modal' data-target='#mostrar_ida'>Mostrar</button>" +
                            "<div class='modal fade' id='mostrar" + row.IdHistorico +
                            "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>" +
                            "<div class='modal-dialog modal-dialog-centered' role='document'>" +
                            "<div class='modal-content'>" +
                            "<div class='modal-header'>" +
                            "<h5 class='modal-title' id='exampleModalLongTitle'>DETALLES DE: </h5>" +
                            "</div>" +
                            "<div class='modal-body'>" +
                            "<p><strong>OBSERVACIÓN: </strong>" + row.HisObservaciones + "</p>" +
                            "<p><strong>FECHA DE SOLICITUD: </strong>" + row.HisFechaSolicitud + "</p>" +
                            "<p><strong>FECHA DE RESPUESTA: </strong>" + row.HisFechaRespuesta + "</p>" +
                            "<p><strong>ESTA HABILITADO: </strong>" + row.HisIsHabilitado + "</p>" +
                            "<p><strong>DETALLE DE HABILITACION: </strong>" + row.HisDetalleIsHabilitado + "</p>" +
                            "<p><strong>ID CANDIDATO: </strong>" + row.HisIdCandidato + "</p>" +
                            "<p><strong>CARGO: </strong>" + row.NombreCargo + "</p>" +
                            "<p><strong>ESTA ACTIVO: </strong>" + row.HisIsActivo + "</p>" +
                            "<div class='modal-footer'>" +
                            "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                        var url = result.replace('_ida', ida);
                        return url;
                    }
                },
            ]
        });
    });
</script>
@endsection