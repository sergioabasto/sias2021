@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">MUNICIPIOS</div>
        <div class="card-body">
          <!-- {{ Form::open(['route' => 'buscarmunicipio', 'method' => 'GET', 'class' => 'form-inline pull-left text-right']) }} -->
          @can('municipios.create')
          <a href="{{route('municipios.create')}}" class="btn btn-sm btn-primary">Agregar Municipio</a>
          @endcan
          <!-- {{ Form::close() }} -->
          <br><br>
          <!-- <div class="card-body"> -->
          <table class="table table-bordered table-sm" id="municipio">
            <thead>
              <tr class="grid">
                <!--th scope="col">#</th-->
                <th scope="col">Departamento</th>
                <th scope="col">Provincia</th>
                <th scope="col">Municipio</th>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($municipios as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->NombreDepartamento }}</td>
                <td>{{$item->NombreProvincia}}</td>
                <td>{{$item->NombreMunicipio}}</td>
                <td width=10px>
                  @can('municipios.show')
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal{{$item->IdMunicipio}}">
                    Mostrar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modal{{$item->IdMunicipio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DESCRIPCION MUNICIPIO</h5>
                        </div>
                        <div class="modal-body">
                          <p><strong>Departamento: </strong>{{$item->NombreDepartamento}}</p>
                          <p><strong>Provincia:</strong> {{$item->NombreProvincia}}</p>
                          <p><strong>Municipio:</strong> {{$item->NombreMunicipio}}</p>
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
                  @can('municipios.edit')
                  <a href="{{route('municipios.edit',$item->IdMunicipio)}}" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$municipios->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection