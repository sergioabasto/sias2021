<div class="form-group">
  {!! Form::label('NombreDepartamento','Departamento') !!}
  {!! Form::text('NombreDepartamento', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
  <a href="{{route('departamentos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
</div>
<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
  $(document).ready(function() {
    $('body').on('click', '#guardar', function(e) {
      if ($('#NombreDepartamento').val() === "") {
        e.preventDefault();
        alert("Debe llenar el campo Departamento");
      }
    });
  });
</script>