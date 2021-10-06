<div class="form-group">
    {!! Form::label('NombreCompleto','Nombre del Personal') !!}
    {!! Form::text('NombreCompleto', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Cargo','Nombre del Cargo') !!}
    {!! Form::text('Cargo', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Posicion','Numero de la Posicion') !!}
    {!! Form::text('Posicion', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
</div>
