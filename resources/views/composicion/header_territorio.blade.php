
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
                <p class="centro grande_titulos_comp letra_titulos"><b>CANDIDATOS(AS) ELECTOS(AS)<br>ASAMBLEÍSTAS DEPARTAMENTALES POR TERRITORIO</b></p>
            </td>
            <td width="15%">
                <p style="text-align:center;" class="qr_margenes_comp">
                    {!!QrCode::size(100)->generate("Tribunal Electoral de LA PAZ \n Elecciones de Autoridades Politicas
                    Departamentales Regionales y Municipales \n TED-LAPAZ-".date('d-m-Y')." \n https://lapaz.oep.org.bo \n Telefonos:
                    (591)2-2424221/ (591)2-2422338 \n La Paz Bolivia") !!}
                    <br>
                    <p class="qr_pie_comp">Elecciones Subnacionales 2021</p>
                </p>

            </td>

        </tr>
    </table>
</div>
<br>
<br>
{{-- fin header --}}
@include('composicion.autoridades_territorio')



