<div class="form-group">
    {!! Form::label('Ambito','Ambito') !!}
    <select class="form-control" name="Ambito" id="Ambito">
        <option>--Elegir opción--</option>
        <option {{ ( $cargo->Ambito === 'Municipal' ) ? 'selected' : '' }}>Municipal</option>
        <option {{ ( $cargo->Ambito === 'Departamental' ) ? 'selected' : '' }}>Departamental</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('NombreCargo','Nombre del Cargo') !!}
    {!! Form::text('NombreCargo', ( $cargo->NombreCargo !== '' ) ? $cargo->NombreCargo : 'ASAMBLEÍSTA TITULAR DE LA NACIÓN Y PUEBLO INDÍGENA ORIGINARIO' , ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Titularidad','Titularidad') !!}
    <select class="form-control" name="Titularidad" id="Titularidad">
        <option>--Elegir opción--</option>
        <option {{ ( $cargo->Titularidad === 'Titular' ) ? 'selected' : '' }}>Titular</option>
        <option {{ ( $cargo->Titularidad === 'Suplente' ) ? 'selected' : '' }}>Suplente</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('Posicion','Posicion') !!}
    <select class="form-control" name="Posicion" id="Posicion">
        <option>--Elegir opción--</option>
        <option {{ ( $cargo->Posicion == '1' ) ? 'selected' : '' }}>1</option>
        <option {{ ( $cargo->Posicion == '2' ) ? 'selected' : '' }}>2</option>
        <option {{ ( $cargo->Posicion == '3' ) ? 'selected' : '' }}>3</option>
        <option {{ ( $cargo->Posicion == '4' ) ? 'selected' : '' }}>4</option>
        <option {{ ( $cargo->Posicion == '5' ) ? 'selected' : '' }}>5</option>
        <option {{ ( $cargo->Posicion == '6' ) ? 'selected' : '' }}>6</option>
        <option {{ ( $cargo->Posicion == '7' ) ? 'selected' : '' }}>7</option>
        <option {{ ( $cargo->Posicion == '8' ) ? 'selected' : '' }}>8</option>
        <option {{ ( $cargo->Posicion == '9' ) ? 'selected' : '' }}>9</option>
        <option {{ ( $cargo->Posicion == '10' ) ? 'selected' : '' }}>10</option>
        <option {{ ( $cargo->Posicion == '11' ) ? 'selected' : '' }}>11</option>
        <option {{ ( $cargo->Posicion == '12' ) ? 'selected' : '' }}>12</option>
        <option {{ ( $cargo->Posicion == '13' ) ? 'selected' : '' }}>13</option>
        <option {{ ( $cargo->Posicion == '14' ) ? 'selected' : '' }}>14</option>
        <option {{ ( $cargo->Posicion == '15' ) ? 'selected' : '' }}>15</option>
        <option {{ ( $cargo->Posicion == '16' ) ? 'selected' : '' }}>16</option>
        <option {{ ( $cargo->Posicion == '17' ) ? 'selected' : '' }}>17</option>
        <option {{ ( $cargo->Posicion == '18' ) ? 'selected' : '' }}>18</option>
        <option {{ ( $cargo->Posicion == '19' ) ? 'selected' : '' }}>19</option>
        <option {{ ( $cargo->Posicion == '20' ) ? 'selected' : '' }}>20</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('DetalleCargo','Detalle del Cargo') !!}
    {!! Form::text('DetalleCargo', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary', 'id' => 'guardar']) !!}

</div>
<script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
<script type="text/javascript" defer>
    $(document).ready(function() {
        $('body').on('click', '#guardar', function(e) {
            if ($('#Posicion').val() === "--Elegir opción--" || $('#Ambito').val() === "--Elegir opción--" || $('#Titularidad').val() === '--Elegir opción--') {
                e.preventDefault();
                alert("Los campos posición, ambito, titularidad son obligatorios ");
            }
        });
    });
</script>