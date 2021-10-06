<div class="margen_estatico">

</div>
<div class="page-break p-10 ancho_pagina_comp" style="">
<div class="block">
    @if($estado === "alcaldia_concejal")
    @include('composicion.header')
    @endif

    @if($estado === "territorio")
    @include('composicion.header_territorio')
    @endif

    @if($estado === "poblacion")
    @include('composicion.header_poblacion')
    @endif

    @if($estado === "npioc")
    @include('composicion.header_npioc')
    @endif
</div>
</div>
