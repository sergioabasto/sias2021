@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-white">
                    RESOLUCION
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="grid">
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resolucion_credencials as $item)
                            <tr>
                                <!--th scope="row">{{$loop->iteration}}</th-->
                                <td>{{$item->Descripcion}}</td>
                                <td width=10px>
                                    <a href="{{route('resolucion.edit',$item->IdResolucionCredencial)}}"
                                        class="btn btn-sm btn-info">Editar</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            @endforeach
                        </tbody>
                    </table>
                    {{$resolucion_credencials->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
