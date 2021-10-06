
{{-- header --}}
<div>
    <table width="100%">
        <tr>
            <td width="15%">
                <p style="text-align:center;">
                    @include('composicion.logo')
                </p>
            </td>
            <td width="70%">
                <p class="centro grande_titulos_comp letra_titulos"><b>Cuadro Resúmen Interno de Antecedentes</b></p>
            </td>
            <td width="15%">
                <p style="text-align:center;" class="qr_margenes_comp">
                    {!!QrCode::size(100)->generate("Tribunal Electoral de LA PAZ \n Elecciones de Autoridades Politicas
                    Departamentales Regionales y Municipales \n ".$nombre_pdf."\n TED-LAPAZ-".date('d-m-Y')." \n https://lapaz.oep.org.bo \n Telefonos:
                    (591)2-2424221/ (591)2-2422338 \n La Paz Bolivia") !!}
                    <br>
                    <p class="qr_pie_comp">Elecciones Subnacionales 2021</p>
                </p>

            </td>

        </tr>
    </table>
</div>
        @if(isset($antecedente_request))
        @switch($antecedente_request)
        @case('alcalde_concejal')
        <table width="100%">
            <tr>
                <td>
                    @foreach ($provincia as $p)
                    Provincia: {{($p->NombreProvincia)}}
                    @endforeach
                    <br>
                    <br>
                </td>
            </tr>
            <tr style="background-color:white">
                <td>
                    @foreach ($municipio as $m)
                    Municipio: {{($m->NombreMunicipio)}}
                    @endforeach
                </td>
                <td>
                    <b>ANTECEDENTES - ALCALDE Y CONCEJALES</b>
                </td>
            </tr>
        </table>
        @break

        @case('gobernador')
        <table width="100%">
            <tr style="background-color:white">
                <td>
                    <b>ANTECEDENTES - GOBERNADOR</b>
                </td>
            </tr>
        </table>
        @break
        @case('asambleista_poblacion')
        <table width="100%">
            <tr style="background-color:white">
                <td>
                    <b>ANTECEDENTES - ASAMBLEÍSTAS DEPARTAMENTALES POR POBLACIÓN</b>
                </td>
            </tr>
        </table>
        @break
        @case('asambleista_territorio')
        <table width="100%">
            <tr style="background-color:white">
                <td>
                    <b>ANTECEDENTES - ASAMBLEÍSTAS DEPARTAMENTALES POR TERRITORIO</b>
                </td>
            </tr>
        </table>
        @break
        @case('asambleistas_npioc')
        <table width="100%">
            <tr style="background-color:white">
                <td>
                    <b>ANTECEDENTES - ASAMBLEÍSTAS DE LAS NACIONES Y PUEBLOS INDÍGENAS ORIGINARIOS </b>
                </td>
            </tr>
        </table>
        @break
        <span>--</span>
        @endswitch
        @endif
{{-- <table width="100%">
    <tr>
        <td>
            @foreach ($provincia as $p)
            Provincia: {{($p->NombreProvincia)}}
            @endforeach
            <br>
            <br>
        </td>
    </tr>
    <tr style="background-color:white">
        <td>
            @foreach ($municipio as $m)
            Municipio: {{($m->NombreMunicipio)}}
            @endforeach
        </td>
        <td>
            <b>ANTECEDENTES - ALCALDE Y CONCEJALES</b>
        </td>
    </tr>
</table> --}}



{{-- fin header --}}
<table width="100%" class="tablesinespacio letra">
    <tr class="border_bottom_comp">
        <th width="10%">Sigla</th>
        <th width="16%">Cargo</th>
        <th width="9%">Titularidad</th>
        <th width="10%">Nombres</th>
        <th width="10%">Paterno</th>
        <th width="10%">Materno</th>
        <th width="7%">Fecha registro</th>
        <th width="21%">DIR-Observaciones</th>
    </tr>
    @include('antecedentes.autoridades')
</table>


