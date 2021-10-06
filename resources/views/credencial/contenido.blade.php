<div class="block colortodo">
    {{-- header --}}
    <div>
    @if($estado === "Alcaldia")
        <table width="100%" height="330px">
    @endif
    @if($estado === "Territorio" || $estado === "Gobernador" || $estado === "Poblacion" || $estado === "npioc")
        <table width="100%" height="370px">
    @endif
            <tr>
                <td>
                    {{-- <p style="text-align:center;">
                        @include('credencial.logo')
                    </p> --}}
                </td>
                <td>
                    {{-- <p class="centro grande_titulos letra_titulos"><b>CREDENCIAL</b></p> --}}
                </td>
            </tr>
        </table>
    </div>
    {{-- fin header --}}


    {{-- <p class="justificado resolucion letra"><b>El Tribunal Electoral Departamental de La Paz, con la facultad
            conferida
            por el
            artículo 192-IV de la Ley N° 026 del Régimen Electoral y de conformidad con la Resolución TEDLP N°
            122/2020 S.C. de 17 de diciembre de 2020, otorga la presente Credencial de:</b></p> --}}
    <p class="centro grande_titulos letra_titulos">
        <b class="colorcargo">
            {{$consejal->cargo}}
        </b>
    </p>
    @if($estado === "Alcaldia")
        <p class="centro mediano_electo letra">del Municipio de:</p>
        <p class="centro grande_titulos letra_titulos"><b>{{mb_strtoupper($consejal->NombreMunicipio, "UTF-8")}}</b>
        </p>
    @endif
    @if($estado === "Alcaldia" || $estado === "Territorio")
    <p class="centro mediano_electo letra">de la Provincia: </p>
    <p class="centro grande_titulos letra_titulos"><b>{{mb_strtoupper($consejal->NombreProvincia, "UTF-8")}}</b>
    </p>
    @endif
    @if($estado === "Gobernador" || $estado === "Poblacion" || $estado === "npioc")
    <p class="centro mediano_electo letra">del Departamento de: </p>
    <p class="centro grande_titulos letra_titulos"><b>{{mb_strtoupper('La Paz', "UTF-8")}}</b>
    </p>
    @endif
    <p class="centro mediano_electo letra">
        {{$consejal->Genero == "MASCULINO"?"Al ciudadano":"A la ciudadana"}}:</p>
    <p class="centro grande_titulos letra_titulos">
        <b>{{mb_strtoupper($consejal->Nombres.' '.$consejal->PrimerApellido.' '.$consejal->SegundoApellido, "UTF-8")}}</b>
    </p>
    <br>
    <br>
    <br>
    <table width="100%" class="tablesinespacio letra">

        <tr>
            <td colspan="12" style="text-align:center;">
                <p class="centro pequeno_autoridades margen_presidente ">{{$posicion[0]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo"><b>{{$posicion[0]['cargo']}}</b></p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;width:50%" colspan="6">
                <p class="centro pequeno_autoridades margen_vocales">{{$posicion[1]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo"><b>{{$posicion[1]['cargo']}}</b></p>
            </td>
            <td style="text-align:center;width:50%" colspan="6">
                <p class="centro pequeno_autoridades margen_vocales">{{$posicion[2]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo"><b>{{$posicion[2]['cargo']}}</b></p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;width:50%" colspan="6">
                <p class="centro pequeno_autoridades margen_vocales">{{$posicion[3]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo"><b>{{$posicion[3]['cargo']}}</b></p>
            </td>
            <td style="text-align:center;width:50%" colspan="6">
                <p class="centro pequeno_autoridades margen_vocales">{{$posicion[4]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo"><b>{{$posicion[4]['cargo']}}</b></p>
            </td>
        </tr>
        <tr>
            <td class="sinespacio" colspan="12">
                <p class="sinespacio pequeno_autoridades">Ante mi:</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:20%">
                <p style="text-align:right">
                </p>
            </td>
            <td style="text-align:right;width:60%" colspan="8">
                <p class="centro pequeno_autoridades margen_secretario_camara">{{$posicion[5]['nombre']}}</p>
                <p class="centro pequeno_autoridades margen_cargo_secretario_camara">
                    <b>{{$posicion[5]['cargo']}}</b></p>
            </td>
            <td colspan="2" style="width:20%">
                <p style="text-align:right">
                    {!!QrCode::size(100)->generate($consejal->Nombres." ".$consejal->PrimerApellido." ".$consejal->SegundoApellido."\n".$consejal->cargo."\n"."Tribunal Electoral de LA PAZ \n Elecciones de Autoridades Politicas Departamentales Regionales y Municipales \n TED-LAPAZ-".date('d-m-Y')." \n https://lapaz.oep.org.bo \n Telefonos: (591)2-2424221/ (591)2-2422338 \n La Paz Bolivia" . "\nCOD: 000".$consejal->IdCandidato) !!}
                </p>
            </td>
        </tr>

    </table>
    @if($resolucion[0]->Descripcion !== "" && $resolucion[0]->Descripcion !== null)
        <hr>
        <p style="text-align: left;" class="colorcargo"><b class="colorcargo">{{$resolucion[0]->Descripcion}}</b></p>
    @endif

</div>
