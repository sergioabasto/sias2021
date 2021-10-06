@foreach ($autoridades as $autoridad)
@php
    $cargo = "";
    if($autoridad->NombreCargo === "Alcaldesa(e)" && $autoridad->Posicion === 1){
        $cargo = "Alcalde (sa)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 1){
        $cargo = "Primer Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 2){
        $cargo = "Segundo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 3){
        $cargo = "Tercer Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 4){
        $cargo = "Cuarto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 5){
        $cargo = "Quinto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 6){
        $cargo = "Sexto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 7){
        $cargo = "Séptimo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 8){
        $cargo = "Octavo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 9){
        $cargo = "Noveno Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 10){
        $cargo = "Decimo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 11){
        $cargo = "Décimo Primer Concejal (a)";
    }else{
        $cargo = 'Otro';
    }
@endphp
<tr class="border_bottom_comp">
        <td>{{$autoridad->Sigla}}</td>
        <td><sup>{{$autoridad->Posicion . ' ' . $cargo}}</sup>
        </td>
        <td>{{$autoridad->Titularidad}}</td>
        <td>{{$autoridad->Nombres}}</td>
        <td>{{$autoridad->PrimerApellido}}</td>
        <td>{{$autoridad->SegundoApellido}}</td>
        <td></td>
        <td class="dir_observaciones_comp">
            @if($autoridad->DetalleIsHabilitado !== "Candidato Electo 2021")
                {{$autoridad->DetalleIsHabilitado}}
            @endif
        </td>
</tr>
@endforeach
