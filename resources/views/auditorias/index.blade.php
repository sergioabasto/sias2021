@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">MONITOREO DE USUARIOS</div>
                <div class="card-body">
                    <br>
                    <table class="table table-bordered table-sm" id="auditorias">
                        <thead>
                            <tr class="grid">
                                <!--th scope="col">#</th-->
                                <th scope="col">NOMBRE TABLA</th>
                                <th scope="col">ACCIÓN</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">FECHA</th>
                            </tr>
                        </thead>
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
        var table = $('#auditorias').DataTable({
            processing: true,
            serverSide: false,
            "language": {
                "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
            },
            "order": [
                [3, "desc"]
            ],
            ajax: "{{ route('auditorias.index') }}",
            columns: [{
                    data: 'NombreTabla',
                    name: 'NombreTabla'
                },
                {
                    data: 'Accion',
                    name: 'Accion'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
            ]
        });
    });
</script>
@endsection