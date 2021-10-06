<div class="form-group">
  {!! Form::label('IdDepartamento','Departamento') !!}
  <select name="IdDepartamento" id="IdDepartamento" class="form-control">
    <option value="0">Seleccionar Departamento</option>
    @foreach($departamentos as $departamento)
    <option {{ ( $provincia->IdDepartamento === $departamento['IdDepartamento'] ) ? 'selected' : '' }} value="{{$departamento['IdDepartamento']}}">{{$departamento['NombreDepartamento']}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  {!! Form::label('NombreProvincia','Provincia') !!}
  {!! Form::text('NombreProvincia', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
  <a href="{{route('provincias.index')}}" class="btn btn-sm btn-primary">Regresar</a>
</div>
<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
  $(document).ready(function() {
    $('body').on('click', '#guardar', function(e) {
      x = 'Debe llenar el campo';
      if ($('#IdDepartamento').val() === "0") {
        e.preventDefault();
        x = x + " - Departamento";
      }
      if ($('#NombreProvincia').val() === "") {
        e.preventDefault();
        x = x + " - Provincia";
      }
      if(x != 'Debe llenar el campo')
        alert(x);
    });
  });
</script>