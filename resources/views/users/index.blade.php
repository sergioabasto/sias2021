@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ROLES</div>
                <div class="card-body">
                    <table id="usuario" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">USUARIO</th>
                                <th scope="col">CORREO ELECTRÓNICO</th>
                                <th scope="col">MOSTRAR</th>
                                <th scope="col">EDITAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td width=10px>
                                    @can('users.show')
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->id}}">
                                        Mostrar
                                    </button>
                                    <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCIÓN DEL USUARIO</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nombre:</strong> {{$item->name}}</p>
                                                    <p><strong>Correo Electronico: </strong> {{$item->email}}</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </td>
                                <td width=10px>
                                    @can('users.edit')
                                    <a href="{{route('users.edit',$item->id)}}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#usuario').DataTable({
            "language": {
                "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
            },
        });
    });
</script>
@endsection