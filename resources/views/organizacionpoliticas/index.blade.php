@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Organizaciones Politicas
                </div>
                <div class="card-body">
                  @can('organizacionpoliticas.create')
                  <a href="{{route('organizacionpoliticas.create')}}" class="btn btn-sm btn-primary">Crear Nueva Organizacion Politica</a>
                  @endcan
                  <br><br>
                  <table class="table table-bordered table-sm">
                    <thead>
                      <tr class="grid">
                        <!--th scope="col">#</th-->
                        <th scope="col">Nombre Organizacion</th>
                        <th scope="col">Sigla</th>

                        <th scope="col" colspan="3"></th>
                      </tr >
                    </thead>
                    <tbody>
                      @foreach ($organizacion_politicas as $item)
                        <tr>
                          <!--th scope="row">{{$loop->iteration}}</th-->
                          <td>{{$item->NombreOrganizacion}}</td>
                          <td>{{$item->Sigla}}</td>

                          <td>
                          @can('organizacionpoliticas.show')
                          <a href="{{route('organizacionpoliticas.show',$item->IdOrganizacionPolitica)}}" class="btn btn-sm btn-success">Mostrar</a>
                          @endcan
                          </td>
                          <td>
                            @can('organizacionpoliticas.edit')
                            <a href="{{route('organizacionpoliticas.edit',$item->IdOrganizacionPolitica)}}" class="btn btn-sm btn-info">Editar</a>
                            @endcan
                          </td>
                          <td>
                            @can('organizacionpoliticas.destroy')
                            {!!Form::open(['route'=>['organizacionpoliticas.destroy',$item->IdOrganizacionPolitica],'method'=> 'DELETE', 'id'=> 'formeliminar'])!!}
                            <button class="btn btn-sm btn-danger" id="eliminar">Eliminar</button>
                            {!! Form::close() !!}
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$organizacion_politicas->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
