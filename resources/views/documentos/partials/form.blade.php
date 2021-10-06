<div class="form-group">
    {!! Form::label('Documento','documento digital') !!}
    {!! Form::file('Documento', null, ['class'=> 'form-control']) !!}
  </div>

<div class="form-group">
  {!! Form::label('DocumentoDescripcion','Descripcion del Documento') !!}
  {!! Form::textArea('DocumentoDescripcion', null, ['class'=> 'form-control','rows'=>'3']) !!}
</div>


<div class="form-group">
{!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
</div>
