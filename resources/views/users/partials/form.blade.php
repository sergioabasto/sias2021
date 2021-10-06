<div class="form-group">
  {!! Form::label('name','Nombre Completo') !!}
  {!! Form::text('name', null, ['class'=> 'form-control']) !!}
  {!! Form::label('email','Email') !!}
  {!! Form::text('email', null, ['class'=> 'form-control']) !!}
</div>
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($roles as $item)
    <li>
      <label>
        {!! Form::checkbox('roles[]',$item->id,null) !!}
        {{$item->name}}
        <em>({{$item->description ?:'Sin descripcion'}})</em>
      </label>
    </li>
    @endforeach
  </ul>
</div>
<div class="form-group">
  {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
</div>