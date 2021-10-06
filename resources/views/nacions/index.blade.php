@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">NACIONES Y PUEBLOS INDIGENAS</div>
        <div class="card-body">
          @can('nacions.create')
          <a href="{{route('nacions.create')}}" class="btn btn-sm btn-primary">Agregar Nación y Pueblo Indigena</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <th scope="col">Nación y Pueblo Indigena</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nacions as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->NombreNacion}}</td>
                <td width=10px>
                  @can('nacions.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdNacion}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdNacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION NACIÓN Y PUEBLO INDIGENA</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Nación y Pueblo Indigena: </strong>{{$item->NombreNacion}}</p>
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
                  @can('nacions.edit')
                  <a href="{{route('nacions.edit',$item->IdNacion)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$nacions->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection