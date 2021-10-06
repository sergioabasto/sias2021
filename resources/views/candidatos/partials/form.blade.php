<div class="form-row">
  <div class="form-group col-md-4">
    {!! Form::label('Nombres','Nombres') !!}
    {!! Form::text('Nombres', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('PrimerApellido','Apellido Paterno') !!}
    {!! Form::text('PrimerApellido', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('SegundoApellido','Apellido Materno') !!}
    {!! Form::text('SegundoApellido', null, ['class'=> 'form-control']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    {!! Form::label('DocumentoIdentidad','Documento de Identidad') !!}
    {!! Form::text('DocumentoIdentidad', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('ComplementoSegip','ComplementoSegip') !!}
    {!! Form::text('ComplementoSegip', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('LugarExpedido','LugarExpedido') !!}
    {!! Form::text('LugarExpedido', null, ['class'=> 'form-control']) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('Direccion','Direccion') !!}
  {!! Form::text('Direccion', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    {!! Form::label('Genero','Genero') !!}
    {!! Form::text('Genero', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('Telefono','Telefono') !!}
    {!! Form::text('Telefono', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('FechaNacimiento','Fecha de Nacimiento') !!}
    {!! Form::date('FechaNacimiento', null, ['class'=> 'form-control']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    {!! Form::label('IsElecto','Es Electo') !!}
    {!! Form::text('IsElecto', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('IdCargo','Cargo') !!}
    <select class="form-control" name="IdCargo" id="IdCargo">
      @foreach($cargos as $cargo)
      @if($candidato->IdCargo == $cargo->IdCargo)
      <option value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}} {{$cargo['Posicion']}}</option>
      @endif
      @endforeach
      @foreach($cargos as $cargo)
      <option value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}} {{$cargo['Posicion']}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('IdProcesoElectoral','Proceso Electoral') !!}
    @foreach($procesoelectorals as $procesoelectoral)
    @if($candidato->IdProcesoElectoral == $procesoelectoral->IdProcesoElectoral)
    <input type="text" value="{{$procesoelectoral['DetalleProceso']}}" class="form-control">
    @endif
    @endforeach
  </div>
</div>
<div class="form-group">
  {!! Form::label('IdOrganizacionPolitica','Organizacion Politica') !!}
  <select class="form-control" name="IdOrganizacionPolitica" id="IdOrganizacionPolitica">
    @foreach($organizacionpoliticas as $organizacionpolitica)
    @if($candidato->IdOrganizacionPolitica == $organizacionpolitica->IdOrganizacionPolitica)
    <option value="{{$organizacionpolitica['IdOrganizacionPolitica']}}">{{$organizacionpolitica['NombreOrganizacion']}}</option>
    @endif
    @endforeach
    @foreach($organizacionpoliticas as $organizacionpolitica)
    <option value="{{$organizacionpolitica['IdOrganizacionPolitica']}}">{{$organizacionpolitica['NombreOrganizacion']}}</option>
    @endforeach
  </select>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    {!! Form::label('IdDepartamento','Departamento') !!}
    <select name="IdDepartamento" id="IdDepartamento" class="form-control">
      @foreach($departamentos as $departamento)
      @if($candidato->IdDepartamento == $departamento->IdDepartamento)
      <option value="{{$departamento['IdDepartamento']}}">{{$departamento['NombreDepartamento']}}</option>
      @endif
      @endforeach
      @foreach($departamentos as $departamento)
      <option value="{{$departamento['IdDepartamento']}}">{{$departamento['NombreDepartamento']}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('IdProvincia','Provincia') !!}
    <select name="IdProvincia" id="IdProvincia" class="form-control">
      @foreach($provincias as $provincia)
      @if ($candidato->IdProvincia == $provincia->IdProvincia)
      <option value="{{$provincia['IdProvincia']}}">{{$provincia['NombreProvincia']}}</option>
      @endif
      @endforeach
      @foreach($provincias as $provincia)
      <option value="{{$provincia['IdProvincia']}}">{{$provincia['NombreProvincia']}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('IdMunicipio','Municipio') !!}
    <select name="IdMunicipio" id="IdMunicipio" class="form-control">
      @foreach($municipios as $municipio)
      @if ($candidato->IdMunicipio == $municipio->IdMunicipio)
      <option value="{{$municipio['IdMunicipio']}}">{{$municipio['NombreMunicipio']}}</option>
      @endif
      @endforeach
      @foreach($municipios as $municipio)
      <option value="{{$municipio['IdMunicipio']}}">{{$municipio['NombreMunicipio']}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
  <a href="{{route('candidatos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
</div>
<!-- <script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
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
</script> -->






</div>