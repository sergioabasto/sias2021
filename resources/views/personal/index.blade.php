@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">PERSONAL TED</div>
        <div class="card-body">
          <br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <!--th scope="col">#</th-->
                <th scope="col">NOMBRE PERSONAL</th>
                <th scope="col">CARGO</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($personal_teds as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->NombreCompleto}}</td>
                <td>{{$item->Cargo}}</td>
                <td width=10px>
                  @can('personal.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdPersonalTed}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdPersonalTed}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION DEL PERSONAL</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Nombre Completo del Personal: </strong>{{$item->NombreCompleto}}</p>
                          <p><strong>Cargo del Personal: </strong>{{$item->Cargo}}</p>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endcan
                </td>
                <td width=10px>
                  @can('personal.edit')
                  <a href="{{route('personal.edit',$item->IdPersonalTed)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$personal_teds->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection