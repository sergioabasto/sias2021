@foreach ($autoridades as $autoridad)

<tr class="border_bottom_comp">
        <td>{{$autoridad->Sigla}}</td>
        <td><sup>{{$autoridad->Posicion . ' '}}</sup>{{$autoridad->NombreCargo}}</td>
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
