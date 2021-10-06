<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal{{$autoridad->IdAutoridad}}">
    Documento Digital Actual
</button>
<!-- Modal -->
<div class="modal fade" id="modal{{$autoridad->IdAutoridad}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{$autoridad->IdCandidato}}</h5>
            </div>
            <div class="modal-body">
                <embed src="{{asset('storage'.'/'.$autoridad->DocumentoAdjunto)}}" type="application/pdf" width="100%" height="600px" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('FechaSolicitud','Fecha de la solicitud') !!}
        {!! Form::date('FechaSolicitud', null, ['class'=> 'form-control','rows'=>'3']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('FechaIngresoTic','Fecha de ingreso a TIC') !!}
        {!! Form::date('FechaIngresoTic', null, ['class'=> 'form-control','rows'=>'3']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('FechaRespuesta','Fecha de respuesta') !!}
        {!! Form::date('FechaRespuesta', null, ['class'=> 'form-control','rows'=>'3']) !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        {!! Form::label('IsHabilitado','Esta habilitado') !!}
        <select class="form-control" name="IsHabilitado" id="IsHabilitado">
            <option>Habilitado</option>
            <option>InHabilitado</option>
        </select>
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('DetalleIsHabilitado','Resolucion') !!}
        {!! Form::text('DetalleIsHabilitado', null, ['class'=> 'form-control','rows'=>'3']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('IsActivo','Esta activo') !!}
        <select class="form-control" name="IsActivo" id="IsActivo">
            <option>si</option>
            <option>no</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('IdCandidato','Candidato') !!}
        <select class="form-control" name="IdCandidato" id="IdCandidato">
            @foreach($candidatos as $candidato)
            @if($autoridad->IdCandidato == $candidato->IdCandidato)
            <option value="{{$candidato['IdCandidato']}}">{{$candidato['Nombres']}} {{$candidato['PrimerApellido']}} {{$candidato['SegundoApellido']}}</option>
            @endif
            @endforeach
            @foreach ($candidatos as $candidato)
            <option value="{{$candidato['IdCandidato']}}">{{$candidato['Nombres']}} {{$candidato['PrimerApellido']}} {{$candidato['SegundoApellido']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('IdCargo','Cargo') !!}
        <select class="form-control" name="IdCargo" id="IdCargo">
            @foreach($cargos as $cargo)
            @if($autoridad->IdCargo == $cargo->IdCargo)
            <option value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}} {{$cargo['Posicion']}}</option>
            @endif
            @endforeach
            @foreach($cargos as $cargo)
            <option value="{{$cargo['IdCargo']}}">{{$cargo['NombreCargo']}} {{$cargo['Titularidad']}} {{$cargo['Posicion']}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('DocumentoAdjunto',' Introduzca el documento a ser guardado --> ' , 'form-inline pull-rigth') !!}
    {!! Form::file('DocumentoAdjunto', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {!! Form::label('Observaciones','Observaciones') !!}
        {!! Form::textArea('Observaciones', null, ['class'=> 'form-control','rows'=>'3']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::submit('GUARDAR CAMBIOS', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}
</div>