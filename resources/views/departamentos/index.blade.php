@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">DEPARTAMENTOS</div>
        <div class="card-body">
          @can('departamentos.create')
          <a href="{{route('departamentos.create')}}" class="btn btn-sm btn-primary">Agregar Departamento</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <th scope="col">Departamento</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($departamentos as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->NombreDepartamento}}</td>
                <td width=10px>
                  @can('departamentos.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdDepartamento}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdDepartamento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION DEPARTAMENTO</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Departamento: </strong>{{$item->NombreDepartamento}}</p>
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
                  @can('departamentos.edit')
                  <a href="{{route('departamentos.edit',$item->IdDepartamento)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$departamentos->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection