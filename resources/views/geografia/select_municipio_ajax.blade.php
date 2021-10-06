@php
$muni = 100000;
if(isset($municipio_request))
{
if($municipio_request === 0){
$muni = 100000;
}
else
{
$muni = $municipio_request;
}
}
@endphp
<input type="hidden" name="municipio" id="id_municipio" value="<?php echo $muni; ?>">
<div class="col-3">
    <select class="form-control select-municipio" name="municipioajax" id="municipioajax">
    </select>
    <img class="centro_ajax" id="loader" src="{{asset('img/ajax_loader.gif')}}" alt="loader">
</div>