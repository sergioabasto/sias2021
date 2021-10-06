<div class="form-group">
  <!--  @include('geografia.select_provincia')
  @include('geografia.select_municipio_ajax') -->

  {!! Form::label('IdDepartamento','Departamento') !!}
  <select name="IdDepartamento" id="IdDepartamento" class="form-control">
    <option value="0">Seleccionar Departamento</option>
    @foreach($departamentos as $departamento)
    <option {{ ( $municipio->IdDepartamento === $departamento['IdDepartamento'] ) ? 'selected' : '' }} value="{{$departamento['IdDepartamento']}}">{{$departamento['NombreDepartamento']}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  {!! Form::label('IdProvincia','Provincia') !!}
  <select name="IdProvincia" id="IdProvincia" class="form-control">
    <option value="0">Seleccionar Provincia</option>
    @foreach($provincias as $provincia)
    <option {{ ( $municipio->IdProvincia === $provincia['IdProvincia'] ) ? 'selected' : '' }} value="{{$provincia['IdProvincia']}}">{{$provincia['NombreProvincia']}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  {!! Form::label('NombreMunicipio','Municipio') !!}
  {!! Form::text('NombreMunicipio', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
  <a href="{{route('municipios.index')}}" class="btn btn-sm btn-primary">Regresar</a>
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
      if ($('#IdProvincia').val() === "0") {
        e.preventDefault();
        x = x + " - Provincia";
      }
      if ($('#NombreMunicipio').val() === "") {
        e.preventDefault();
        x = x + " - Municipio";
      }
      if (x != 'Debe llenar el campo')
        alert(x);
    });
  });
</script>