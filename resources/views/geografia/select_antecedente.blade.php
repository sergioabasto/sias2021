<div class="col-3">
    {{-- {{dd($titularidad_request)}} --}}
    <select class="form-control select_antecedente" name="antecedente">
        <option>Seleccionar tipo de antecedente</option>
        @php
        $ante = 100000;
        if(isset($antecedente_request))
        {
        if($antecedente_request === 'Seleccionar tipo de antecedente'){
        $ante = 100000;
        }
        else
        {
        $ante = $antecedente_request;
        }
        }
        @endphp
        <option value="alcalde_concejal" {{ ( $ante == 'alcalde_concejal') ? 'selected' : '' }}>
            Antecentes - Alcalde y Concejales
        </option>
        <option value="municipal" {{ ( $ante == 'municipal') ? 'selected' : '' }}>
            Antecedentes - Municipales
        </option>
        <option value="gobernador" {{ ( $ante == 'gobernador') ? 'selected' : '' }}>
            Antecedentes - Gobernador
        </option>
        <option value="gubernamental" {{ ( $ante == 'gubernamental') ? 'selected' : '' }}>
            Antecedentes - Gubernamentales
        </option>
        <option value="asambleista_poblacion" {{ ( $ante == 'asambleista_poblacion') ? 'selected' : '' }}>
            Antecedentes - Asambleístas por población
        </option>
        <option value="poblacional" {{ ( $ante == 'poblacional') ? 'selected' : '' }}>
            Antecedentes - poblacionales
        </option>
        <option value="asambleista_territorio" {{ ( $ante == 'asambleista_territorio') ? 'selected' : '' }}>
            Antecedentes - Asambleístas por territorio
        </option>
        <option value="territorial" {{ ( $ante == 'territorial') ? 'selected' : '' }}>
            Antecedentes - territoriales
        </option>
        <option value="asambleistas_npioc" {{ ( $ante == 'asambleistas_npioc') ? 'selected' : '' }}>
            Antecedentes - Asambleistas nación y pueblo indígena originario
        </option>
        <option value="npiocal" {{ ( $ante == 'npiocal') ? 'selected' : '' }}>
            Antecedentes - Naciones y pueblos indígenas originarios
        </option>
    </select>
</div>
