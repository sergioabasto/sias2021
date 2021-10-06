@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">ROLES</div>
        <div class="card-body">
          @can('roles.create')
          <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">Agregar Rol</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <!--th scope="col">#</th-->
                <th scope="col">ROL</th>
                <th scope="col">ABREVIATURA</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->name}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->description}}</td>
                <td width=10px>
                  @can('roles.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->id}}">
                    Mostrar
                  </button>
                  <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCIÓN DEL ROL</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Nombre del Role:</strong> {{$item->name}}</p>
                          <p><strong>Abreviatura: </strong> {{$item->slug}}</p>
                          <p><strong>Descripción: </strong> {{$item->description}}</p>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endcan
                </td>
                <td width=10px>
                  @can('roles.edit')
                  <a href="{{route('roles.edit',$item->id)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$roles->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection