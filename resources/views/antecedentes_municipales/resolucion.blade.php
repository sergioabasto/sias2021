@foreach ($autoridades as $autoridad)
@if($autoridad->Observaciones !== "Ninguna")
<tr class="border_bottom_comp">
        <td>
                {{date('d-m-Y', strtotime($autoridad->modificado_autoridad))}}
        </td>
        <td class="dir_observaciones_comp" style="text-align: center">
                {{$autoridad->Observaciones}}
        </td>
</tr>
@endif
@endforeach
