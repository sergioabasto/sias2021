@php
$prov = 100000;
if(isset($provincia_request))
{
if($provincia_request === 0){
$prov = 100000;
}
else
{
$prov = $provincia_request;
}
}
@endphp
<input type="hidden" name="id_provincia" id="id_provincia" value="<?php echo $prov; ?>">
<div class="col-4">
    <select class="form-control select-provincia" name="provincia" id="provincia">
        <option>Seleccionar provincia</option>
        @foreach ($provincias as $key => $value)
        <option value="{{ $value->IdProvincia }}" {{ ( $value->IdProvincia == $prov) ? 'selected' : '' }}>
            {{ $value->NombreProvincia }}
        </option>
        @endforeach
    </select>
</div>