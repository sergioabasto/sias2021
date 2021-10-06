<div class="col-3">
    <select class="form-control  select-cargo" name="cargo">
        <option>Seleccionar cargo</option>
        @php
        $carg = 100000;
        if(isset($cargo_request))
        {
        if($cargo_request === 'Seleccionar cargo'){
        $carg = 100000;
        }
        else
        {
        $carg = $cargo_request;
        }
        }
        @endphp
        @foreach ($cargos as $key => $value)
        <option value="{{ $value->NombreCargo }}" {{ ( $value->NombreCargo == $carg) ? 'selected' : '' }}>
            {{ $value->NombreCargo }}
        </option>
        @endforeach
    </select>
</div>
