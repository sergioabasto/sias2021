@foreach ($autoridades as $autoridad)

<table width="100%" class="tablesinespacio letra">
    {{-- Repetir provincia --}}
    <span>Provincia: {{$autoridad->NombreProvincia}}</span>
    <tr class="border_bottom_comp">
        <th width="10%">Sigla</th>
        <th width="16%">Cargo</th>
        <th width="9%">Titularidad</th>
        <th width="13%">Nombres</th>
        <th width="12%">Paterno</th>
        <th width="12%">Materno</th>
        <th width="7%">Esposo</th>
    </tr>
    <tr class="border_bottom_comp">
            <td>{{$autoridad->Sigla}}</td>
            <td>{{$autoridad->NombreCargo}}</td>
            <td>{{$autoridad->Titularidad}}</td>
            <td>{{$autoridad->Nombres}}</td>
            <td>{{$autoridad->PrimerApellido}}</td>
            <td>{{$autoridad->SegundoApellido}}</td>
            <td></td>
    </tr>
</table>

@endforeach
