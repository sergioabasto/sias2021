
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
                <p class="centro grande_titulos_comp letra_titulos"><b>ALCALDESA (E) Y CONCEJALAS(ES)<br>COMPOSICIÓN POR
                        MUNICIPIO</b></p>
            </td>
            <td width="15%">
                <p style="text-align:center;" class="qr_margenes_comp">
                    {!!QrCode::size(100)->generate("Composición del municipio ".$municipio." de la provincia ".$provincia."\nTribunal Electoral de LA PAZ \n Elecciones de Autoridades Politicas
                    Departamentales Regionales y Municipales \n TED-LAPAZ-".date('d-m-Y H:i:s')." \n https://lapaz.oep.org.bo \n Telefonos:
                    (591)2-2424221/ (591)2-2422338 \n La Paz Bolivia") !!}
                    <br>
                    <p class="qr_pie_comp">Elecciones Subnacionales 2021</p>
                </p>
            </td>

        </tr>
    </table>
</div>
     Provincia: {{($provincia)}}
    <br>
    <br>
     Municipio: {{($municipio)}}
    <br>
    <br>
{{-- fin header --}}
<table width="100%" class="tablesinespacio letra">
    <tr class="border_bottom_comp">
        <th width="10%">Sigla</th>
        <th width="16%">Cargo</th>
        <th width="9%">Titularidad</th>
        <th width="13%">Nombres</th>
        <th width="12%">Paterno</th>
        <th width="12%">Materno</th>
        <th width="7%">Esposo</th>
        <th width="21%">DIR-Observaciones</th>
    </tr>
    @include('composicion.autoridades')
</table>


