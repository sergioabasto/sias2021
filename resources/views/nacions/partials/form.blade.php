<div class="form-group">
  {!! Form::label('NombreNacion','Nación y Pueblo Indígena') !!}
  {!! Form::text('NombreNacion', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
  <a href="{{route('nacions.index')}}" class="btn btn-sm btn-primary">Regresar</a>
</div>
<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
  $(document).ready(function() {
    $('body').on('click', '#guardar', function(e) {
      x = 'Debe llenar el campo';
      if ($('#NombreNacion').val() === "") {
        e.preventDefault();
        x = x + " - Nación y Pueblo Indígena";
      }
      if (x != 'Debe llenar el campo')
        alert(x);
    });
  });
</script></div>