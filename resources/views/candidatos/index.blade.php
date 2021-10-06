@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">CANDIDATOS</div>
        <div class="card-body">
          <table class="table table-bordered table-sm" id="candidato">
            <thead>
              <tr class="grid">
                <th scope="col">Nombre completo</th>
                <th scope="col">Género</th>
                <th scope="col">Org. política</th>
                <th scope="col">Detalle</th>
                <th scope="col">
                  @can('candidatos.edit')
                  Editar
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
    var table = $('#candidato').DataTable({
      processing: true,
      serverSide: false,
      "language": {
        "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
      },
      "order": [
        [0, "asc"]
      ],
      ajax: "{{ route('candidatos.index') }}",
      columns: [{
          data: 'Nombres',
          name: 'Nombres',
          render: function(data, type, row) {
            var formatted = row.Nombres + " " + row.PrimerApellido + " " + row.SegundoApellido;
            return formatted
          }
        },
        {
          data: 'Genero',
          name: 'Genero'
        },
        {
          data: 'Sigla',
          name: 'Sigla'
        },
        {
          data: 'IdCandidato',
          name: 'IdCandidato',
          render: function(data, type, row) {
            var ida = row.IdCandidato;
            var result = "<button  type='button' class='btn btn-sm btn-success' data-toggle='modal' data-target='#modal_ida'>Mostrar</button>" +
              "<div class='modal fade' id='modal" + row.IdCandidato + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>" +
              "<div class='modal-dialog modal-dialog-centered' role='document'>" +
              "<div class='modal-content'>" +
              "<div class='modal-header'>" +
              "<h5 class='modal-title' id='exampleModalLongTitle'>DESCRIPCION CANDIDATO</h5>" +
              "</div>" +
              "<div class='modal-body'>" +
              "<p><strong>Nombre completo: </strong>" + row.Nombres;
            if (row.PrimerApellido != null)
              result = result + " " + row.PrimerApellido;
            if (row.SegundoApellido != null)
              result = result + " " + row.SegundoApellido;
            result = result + "</p>" +
              "<p><strong>Documento de Identidad: </strong>";
            if (row.DocumentoIdentidad != null)
              result = result + row.DocumentoIdentidad;
            result = result + "</p>" +
              "<p><strong>Complemento SEGIP: </strong>";
            if (row.ComplementoSegip != null)
              result = result + row.ComplementoSegip;
            result = result + "</p>" +
              "<p><strong>Lugar expedido: </strong>";
            if (row.LugarExpedido != null)
              result = result + row.LugarExpedido;
            result = result + "</p>" +
              "<p><strong>Género: </strong>";
            if (row.Genero != null)
              result = result + row.Genero;
            result = result + "</p>" +
              "<p><strong>Teléfono: </strong>";
            if (row.Telefono != null)
              result = result + row.Telefono;
            result = result + "</p>" +
              "<p><strong>Fecha de nacimiento: </strong>";
            if (row.FechaNacimiento != null)
              result = result + row.FechaNacimiento;
            result = result + "</p>" +
              "</div>" +
              "<div class='modal-footer'>" +
              "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>";
            var url = result.replace('_ida', ida);
            return url;
          }
        },
        @can('candidatos.edit') {
          data: 'IdCandidato',
          name: 'IdCandidato',
          render: function(data, type, row) {
            var ida = row.IdCandidato;
            var result = "<a href='{{route('candidatos.edit', '_ida')}}' class='btn btn-sm btn-info'>Editar</a>";
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