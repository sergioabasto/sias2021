@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">PROVINCIAS</div>
        <div class="card-body">
          @can('provincias.create')
          <a href="{{route('provincias.create')}}" class="btn btn-sm btn-primary">Agregar Provincia</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <th scope="col">Departamento</th>
                <th scope="col">Provincia</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($provincia as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->NombreDepartamento}}</td>
                <td>{{$item->NombreProvincia}}</td>
                <td width=10px>
                  @can('provincias.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdProvincia}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdProvincia}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION PROVINCIA</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Departamento: </strong>{{$item->NombreDepartamento}}</p>
                          <p><strong>Provincia: </strong>{{$item->NombreProvincia}}</p>
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
                  @can('provincias.edit')
                  <a href="{{route('provincias.edit',$item->IdProvincia)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$provincia->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection