@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white">AUTORIDADES</div>
        <div class="card-body">
          <table class="table table-striped table-bordered" id="autoridad">
            <thead>
              <tr class="grid">
                <th scope="col">AUTORIDADES</th>
                <th scope="col">CARGO</th>
                <th scope="col">HABILITADO</th>
                <th scope="col">CREDENCIAL</th>
                <th scope="col">DETALLE</th>
                <th scope="col">
                  @can('autoridads.edit')
                  EDITAR
                  @endcan
                </th>
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
    var table = $('#autoridad').DataTable({
      processing: true,
      serverSide: false,
      "language": {
        "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
      },
      "order": [
        [0, "asc"]
      ],
      ajax: "{{ route('autoridads.index') }}",
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
          data: 'IsHabilitado',
          name: 'IsHabilitado'
        },
        {
          data: 'IdAutoridad',
          name: 'IdAutoridad',
          render: function(data, type, row) {
            var idc = row.IdCandidato;
            var ida = row.IdAutoridad;
            var result = "<a href='{{ route('buscador_autoridad_id',['download'=>'pdf', 'IdCandidato'=>'_idc', 'IdAutoridad'=>'_ida']) }}' class='btn btn-sm btn-default'>Credencial</a>";
            var url = result.replace('_idc', idc);
            url = url.replace('_ida', ida);
            return url;
          }
        },
        @can('autoridads.show') {
          data: 'IdAutoridad',
          name: 'IdAutoridad',
          render: function(data, type, row) {
            var ida = row.IdAutoridad;
            var result = "<button  type='button' class='btn btn-sm btn-success' data-toggle='modal' data-target='#modal_ida'>Mostrar</button>" +
              "<div class='modal fade' id='modal" + row.IdAutoridad + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>" +
              "<div class='modal-dialog modal-dialog-centered' role='document'>" +
              "<div class='modal-content'>" +
              "<div class='modal-header'>" +
              "<h5 class='modal-title' id='exampleModalLongTitle'>AUTORIDAD ELECTA</h5>" +
              "</div>" +
              "<div class='modal-body'>" +
              "<p><strong>OBSEVACION:</strong>" + row.Observaciones + "</p>" +
              "<p><strong>FECHA DE SOLICITUD:</strong>" + row.FechaSolicitud + "" + "</p>" +
              "<p><strong>FECHA DE RESPUESTA:</strong>" + row.FechaRespuesta + "" + "</p>" +
              "<p><strong>ESTA HABILITADO: </strong>" + row.IsHabilitado + "</p>" +
              "<p><strong>DETALLE DE HABILITACION:</strong>" + row.DetalleIsHabilitado + "</p>" +
              "<p><strong>NOMBRE CANDIDATO:</strong>" + row.Nombres + " " + row.PrimerApellido + " " + row.SegundoApellido + "</p>" +
              "<p><strong>CARGO: </strong>" + row.NombreCargo + " " + row.Titularidad + " " + row.Posicion + "</p>" +
              "<p><strong>ESTA ACTIVO:</strong>" + row.IsActivo + "</p>" +
              "</div>" +
              "<div class='modal-footer'>" +
              "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>";
            var url = result.replace('_ida', ida);
            // console.log(url);
            return url;
          }
        }
        @endcan,
        @can('autoridads.edit') {
          data: 'IdAutoridad',
          name: 'IdAutoridad',
          render: function(data, type, row) {
            var ida = row.IdAutoridad;
            var result = "<a href='{{route('autoridads.edit', '_ida')}}' class='btn btn-sm btn-info'>Editar</a>";
            var url = result.replace('_ida', ida);
            return url;
          }
        }
        @endcan,
      ]
    });
  });
</script>
@endsection