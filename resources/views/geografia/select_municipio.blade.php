<div class="col-3">
    <select class="form-control select-municipio" name="municipio">
        <option>Seleccionar municipio</option>
        @php
        $muni = 100000;
        if(isset($municipio_request))
        {
        if($municipio_request === 0){
        $muni = 100000;
        }
        else
        {
        $muni = $municipio_request;
        }
        }
        @endphp
        @foreach ($municipios as $key => $value)
        <option value="{{ $value->IdMunicipio }}" {{ ( $value->IdMunicipio == $muni) ? 'selected' : '' }}>
            {{ $value->NombreMunicipio }}
        </option>
        @endforeach
    </select>
</div>
