<div class="col-3">
    {{-- {{dd($titularidad_request)}} --}}
    <select class="form-control" name="titularidad">
        <option>Seleccionar titularidad</option>
        @php
        $titu = 100000;
        if(isset($titularidad_request))
        {
        if($titularidad_request === 'Seleccionar titularidad'){
        $titu = 100000;
        }
        else
        {
        $titu = $titularidad_request;
        }
        }
        @endphp
        <option value="Titular" {{ ( $titu == 'Titular') ? 'selected' : '' }}>
            Titular
        </option>
        <option value="Suplente" {{ ( $titu == 'Suplente') ? 'selected' : '' }}>
            Suplente
        </option>
    </select>
</div>
