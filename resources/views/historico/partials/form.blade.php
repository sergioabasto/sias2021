<div class="form-row">
<div class="form-group col-md-6">
    {!! Form::label('FechaSolicitud','Fecha de la solicitud') !!}
    {!! Form::date('FechaSolicitud', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::label('FechaRespuesta','dFecha de Respuesta') !!}
    {!! Form::date('FechaRespuesta', null, ['class'=> 'form-control','rows'=>'3']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    {!! Form::label('IsHabilitado','Esta Habilitado') !!}
    <select class="form-control" name="IsHabilitado" id="IsHabilitado">
        <option>--Si ó No--</option>
        <option>Habilitado</option>
        <option>InHabilitado</option>
    </select>
  </div>
  <div class="form-group col-md-6">
    {!! Form::label('DetalleIsHabilitado','Detalle is Habilitado') !!}
    {!! Form::text('DetalleIsHabilitado', null, ['class'=> 'form-control','rows'=>'3']) !!}
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    {!! Form::label('IdCandidato','candidato') !!}
    <select class="form-control" name="IdCandidato" id="IdCandidato">
        @foreach($candidatos as $candidato)
            <option value="{{$candidato['IdCandidato']}}">{{$candidato['Nombres']}} {{$candidato['PrimerApellido']}}  {{$candidato['SegundoApellido']}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group col-md-6">
    {!! Form::label('IdCargo','Cargo') !!}

    <select class="form-control" name="IdCargo" id="IdCargo">
            @foreach($cargos as $cargo)
                 <option value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}}  {{$cargo['Posicion']}}
                 </option>
            @endforeach
    </select>
  </div>

</div>
  <div class="form-group" >
    {!! Form::label('DocumentoAdjunto','documento digital' , 'form-inline pull-rigth') !!}
    {!! Form::file('DocumentoAdjunto', null, ['class'=> 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Observaciones','Observaciones') !!}
    {!! Form::textArea('Observaciones', null, ['class'=> 'form-control','rows'=>'3']) !!}
  </div>
  <div class="form-group col-md-2">
    {!! Form::label('IsActivo','Esta Activo') !!}

    <select class="form-control" name="IsActivo" id="IsActivo">
        <option >--Esta Activo--</option>
        <option >si</option>
        <option >no</option>
    </select>
  </div>

<div class="form-group">
{!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
</div>


{{--@foreach ($Autoridad as $item)
<option value="{{$item->IdAutoridad}}">{{$item->IdCandidato}}</option>
@endforeach--}}
