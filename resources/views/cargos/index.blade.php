@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">CARGOS</div>
        <div class="card-body">
          @can('cargos.create')
          <a href="{{route('cargos.create')}}" class="btn btn-sm btn-primary">Agregar Cargo</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <!--th scope="col">#</th-->
                <th scope="col">AMBITO</th>
                <th scope="col">NOMBRE DEL CARGO</th>
                <th scope="col">TITULARIDAD</th>
                <th scope="col">POSICIÓN</th>
                <th scope="col">DETALLE</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cargos as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->Ambito}}</td>
                <td>{{$item->NombreCargo}}</td>
                <td>{{$item->Titularidad}}</td>
                <td>{{$item->Posicion}}</td>
                <td>{{$item->DetalleCargo}}</td>
                <td width=10px>
                  @can('cargos.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdCargo}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdCargo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION DEL CARGO</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>AMBITO: </strong>{{$item->Ambito}}</p>
                          <p><strong>NOMBRE DEL CARGO: </strong> {{$item->NombreCargo}}</p>
                          <p><strong>TITULARIDAD: </strong> {{$item->Titularidad}}</p>
                          <p><strong>POSICION: </strong> {{$item->Posicion}}</p>
                          <p><strong>DETALLE DE CARGO:</strong> {{$item->DetalleCargo}}</p>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endcan
                <td width=10px>
                  @can('cargos.edit')
                  <a href="{{route('cargos.edit',$item->IdCargo)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              <!-- Modal -->
              @endforeach
            </tbody>
          </table>
          {{$cargos->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection