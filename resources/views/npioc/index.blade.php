@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">AUTORIDADES NPIOC</div>
        <div class="card-body">
          @can('npiocs.create')
          <a href="{{route('npiocs.create')}}" class="btn btn-sm btn-primary">Agregar Autoridad NPIOC</a>
          @endcan
          <br><br>
          <table class="table table-bordered table-sm">
            <thead>
              <tr class="grid">
                <!--th scope="col">#</th-->
                <th scope="col">NOMBRE</th>
                <th scope="col">AP. PATERNO</th>
                <th scope="col">AP. MATERNO</th>
                <th scope="col">C.I.</th>
                <th scope="col">GENERO</th>
                <th scope="col">FECHA NAC.</th>
                <th scope="col">ELECTO</th>
                <th scope="col">ORG. POLITICA</th>
                <th scope="col" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($npiocs as $item)
              <tr>
                <!--th scope="row">{{$loop->iteration}}</th-->
                <td>{{$item->Nombres}}</td>
                <td>{{$item->PrimerApellido}}</td>
                <td>{{$item->SegundoApellido}}</td>
                <td>{{$item->DocumentoIdentidad}}</td>
                <td>{{$item->Genero}}</td>
                <td>{{$item->FechaNacimiento}}</td>
                <td>{{$item->IsElecto}}</td>
                <td>{{$item->Sigla}}</td>
                <td width=10px>
                  @can('npiocs.show')
                  <a href="{{route('npiocs.show',$item->IdCandidato)}}" class="btn btn-sm btn-success">Mostrar</a>
                  @endcan
                </td>
                <td width=10px>
                  @can('npiocs.edit')
                  <a href="{{route('npiocs.edit',$item->IdCandidato)}}" id="editar" class="btn btn-sm btn-info">Editar</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$npiocs->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection