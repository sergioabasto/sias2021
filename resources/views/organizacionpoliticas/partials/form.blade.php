<div class="form-group">
    {!! Form::label('NombreOrganizacion','Nombre de la organizacion') !!}
    {!! Form::text('NombreOrganizacion', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Sigla','Sigla de la organizacion') !!}
    {!! Form::text('Sigla', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
    </div>
