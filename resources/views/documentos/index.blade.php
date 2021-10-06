@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" >
                  DOCMUENTOS ADJUNTOS PARA LOS CANDIDATOS
                </div>
                <div class="card-body">
                  @can('documentos.create')
                  <a href="{{route('documentos.create')}}" class="btn btn-sm btn-primary">INSERTAR UN NUEVO DOCUMENTO</a>
                  @endcan
                  <br><br>
                  <table class="table table-bordered table-sm" >
                    <thead>
                        <tr class="grid">
                        <!--th scope="col" >#</th-->
                        <th scope="col">DESCRIPCION DEL DOCUMENTO</th>
                        <th scope="col">DOCUMENTO</th>
                        <th scope="col" colspan="3"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($documentos as $item)
                        <tr>
                          <!--th scope="row">{{$loop->iteration}}</th-->
                          <td>{{$item->DocumentoDescripcion}}</td>

                          <td>
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal{{$item->IdDocumento}}">
                              documento
                            </button>
                          </td>

                          <td width = 10px>
                          @can('documentos.show')
                          <a href="{{route('documentos.show',$item->IdDocumento)}}" class="btn btn-sm btn-success">Mostrar</a>
                          @endcan
                          </td>
                          <td width = 10px>
                            @can('autoridads.edit')
                            <a href="{{route('documentos.edit',$item->IdDocumento)}}" class="btn btn-sm btn-info">Editar</a>
                            @endcan
                          </td>
                          <td width = 10px>
                            @can('documentos.destroy')
                            {!!Form::open(['route'=>['autoridads.destroy',$item->IdDocumento],'method'=> 'DELETE', 'id'=> 'formeliminar'])!!}
                            <button class="btn btn-sm btn-danger" id="eliminar">Eliminar</button>
                            {!! Form::close() !!}
                            @endcan
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$item->IdDocumento}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">{{$item->IdDocumento}}</h5>
                              </div>
                              <div class="modal-body">
                                <embed src="{{asset('storage'.'/'.$item->Documento)}}" type="application/pdf" width="100%" height="600px" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </tbody>
                  </table>
                  {{$documentos->render()}}
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
