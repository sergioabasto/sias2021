@foreach ($autoridades as $autoridad)
@php
    $cargo = "";
    if($autoridad->NombreCargo === "Alcaldesa(e)" && $autoridad->Posicion === 1){
        $cargo = $autoridad->Posicion . ' ' . "Alcalde (sa)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 1){
        $cargo = $autoridad->Posicion . ' ' . "Primer Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 2){
        $cargo = $autoridad->Posicion . ' ' . "Segundo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 3){
        $cargo = $autoridad->Posicion . ' ' . "Tercer Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 4){
        $cargo = $autoridad->Posicion . ' ' . "Cuarto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 5){
        $cargo = $autoridad->Posicion . ' ' . "Quinto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 6){
        $cargo = $autoridad->Posicion . ' ' . "Sexto Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 7){
        $cargo = $autoridad->Posicion . ' ' . "Séptimo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 8){
        $cargo = $autoridad->Posicion . ' ' . "Octavo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 9){
        $cargo = $autoridad->Posicion . ' ' . "Noveno Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 10){
        $cargo = $autoridad->Posicion . ' ' . "Decimo Concejal (a)";
    }elseif($autoridad->NombreCargo === "Concejalas(es)" && $autoridad->Posicion === 11){
        $cargo = $autoridad->Posicion . ' ' . "Décimo Primer Concejal (a)";
    }else{
        $cargo = $autoridad->NombreCargo;
    }
@endphp
<tr class="border_bottom_comp">
    @if($autoridad->Observaciones !== "Ninguna")
        <td><b>{{$autoridad->Sigla}}</b></td>
        <td><sup>{{$cargo}}</sup>
        </td>
        <td>{{$autoridad->Titularidad}}</td>
        <td>{{$autoridad->Nombres}}</td>
        <td>{{$autoridad->PrimerApellido}}</td>
        <td>{{$autoridad->SegundoApellido}}</td>
        <td>
                {{date('d-m-Y', strtotime($autoridad->modificado_autoridad))}}
        </td>
        <td class="dir_observaciones_comp" style="text-align: center">
                {{$autoridad->Observaciones}}
        </td>
    @endif
</tr>
@endforeach
