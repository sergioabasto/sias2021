@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">EDITAR AUTORIDAD</div>
        <div class="card-body">
          {!! Form::model($autoridad, ['route'=>['autoridads.update',$autoridad->IdAutoridad],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
          @include('autoridads.partials.formedit')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
  $(document).ready(function() {
    $('body').on('click', '#guardar', function(e) {
      if ($('#DocumentoAdjunto').get(0).files.length === 0) {
        e.preventDefault();
        alert("Debe subir un archivo.");
      }
      if ($('#FechaSolicitud').val() === "" || $('#FechaIngresoTic').val() === "" || $('#FechaRespuesta').val() === "" || $('#Observaciones').val() === "Ninguna") {
        e.preventDefault();
        alert("Debe llenar todos los campos de fecha y observaciones");
      }
    });
  });
</script>