<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body style="border-top: 1px solid #22292f;">
    <div>
        <table width="100%">
            <tr>
                <td>
                    <div class="text-xxxs" align="left"> {{ 'Impreso el '.date('d/m/Y H:i') }} </div>
                {{-- <img src="{{ public_path("/img/vcdi.png") }}" width="80"> --}}
                </td>
                <td style="text-align: center;font-size: 9pt;line-height:20px;">

                </td>
                <td style="text-align:right;">
                {{-- <img src="{{ public_path("/img/evo.png") }}" width="70"> --}}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
