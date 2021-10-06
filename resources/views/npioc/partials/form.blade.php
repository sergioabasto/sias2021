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
        {!! Form::label('ComplementoSegip','Complemento SEGIP') !!}
        {!! Form::text('ComplementoSegip', null, ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('LugarExpedido','Lugar de Expedición') !!}
        <select name="LugarExpedido" id="LugarExpedido" class="form-control">
            @foreach($departamentos as $departamento)
            <option value="{{$departamento['NombreDepartamento']}}" {{ ( $departamento['NombreDepartamento']===$npioc->LugarExpedido ) ? 'selected' : '' }}>
                {{$departamento['NombreDepartamento']}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Direccion','Direccion') !!}
    {!! Form::text('Direccion', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('Genero','Genero') !!}
        <select class="form-control" name="Genero" id="Genero">
            <option>--Elegir opción--</option>
            <option {{ ( $npioc->Genero === 'MASCULINO' ) ? 'selected' : '' }}>MASCULINO</option>
            <option {{ ( $npioc->Genero === 'FEMENINO' ) ? 'selected' : '' }}>FEMENINO</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Telefono','Teléfono') !!}
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
        <select class="form-control" name="IsElecto" id="IsElecto">
            <option>--Si ó No--</option>
            <option {{ ( $npioc->IsElecto === 'si' ) ? 'selected' : '' }}>si</option>
            <option {{ ( $npioc->IsElecto === 'no' ) ? 'selected' : '' }}>no</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('IdCargo','Cargo') !!}
        <select class="form-control" name="IdCargo" id="IdCargo">
            @foreach($cargos as $cargo)
            <option {{ ( $npioc->IdCargo === $cargo['IdCargo'] ) ? 'selected' : '' }} value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}}
                {{$cargo['Posicion']}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('IdProcesoElectoral','Proceso Electoral') !!}
        <select class="form-control" name="IdProcesoElectoral" id="IdProcesoElectoral">
            @foreach($procesoelectoral as $car)
            <option {{ ( $npioc->IdProcesoElectoral === $car['IdProcesoElectoral'] ) ? 'selected' : '' }} value="{{$car['IdProcesoElectoral']}}">{{$car['DetalleProceso']}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('IdOrganizacionPolitica','Organizacion Politica') !!}
    <select class="form-control" name="IdOrganizacionPolitica" id="IdOrganizacionPolitica">
        @foreach($organizacionpoliticas as $organizacionpolitica)
        <option {{ ( $npioc->IdOrganizacionPolitica === $organizacionpolitica['IdOrganizacionPolitica'] ) ? 'selected' : '' }} value="{{$organizacionpolitica['IdOrganizacionPolitica']}}">
            {{$organizacionpolitica['NombreOrganizacion']}}
        </option>
        @endforeach
    </select>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('IdDepartamento','Departamento') !!}
        <select name="IdDepartamento" id="IdDepartamento" class="form-control">
            @foreach($departamentos as $departamento)
            <option {{ ( $npioc->IdDepartamento === $departamento['IdDepartamento'] ) ? 'selected' : '' }} value="{{$departamento['IdDepartamento']}}">{{$departamento['NombreDepartamento']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('IdProvincia','Provincia') !!}
        <select name="IdProvincia" id="IdProvincia" class="form-control">
            @foreach($provincias as $provincia)
            <option {{ ( $npioc->IdProvincia === $provincia['IdProvincia'] ) ? 'selected' : '' }} value="{{$provincia['IdProvincia']}}">{{$provincia['NombreProvincia']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('IdMunicipio','Municipio') !!}
        <select name="IdMunicipio" id="IdMunicipio" class="form-control">
            @foreach($municipios as $municipio)
            <option {{ ( $npioc->IdMunicipio === $municipio['IdMunicipio'] ) ? 'selected' : '' }} value="{{$municipio['IdMunicipio']}}">{{$municipio['NombreMunicipio']}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
</div>

<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
    $(document).ready(function() {
        $('body').on('click', '#guardar', function(e) {
            if ($('#Nombres').val() === "" || $('#Genero').val() === "--Elegir opción--" || $('#IsElecto').val() === '--Si ó No--') {
                e.preventDefault();
                alert("Los campos nombre, género, y si es electo son obligatorios ");
            }
        });
    });
</script>