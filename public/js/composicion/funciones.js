// Buscador dentro del select
$(document).ready(function () {
    $(".select-municipio").select2();
    $(".select-cargo").select2();
    $(".select-provincia").select2();
    $(".select_antecedente").select2();
});

// Traer municipio
$(document).ready(function () {
    provincia = $('select[name="provincia"]');
    municipio = $('select[name="municipioajax"]');
    var loader = $('#loader');
    loader.hide();
    municipio.attr('disabled', 'disabled')
    municipio.change(function () {
        var id = $(this).val();
        // if(!id){
        //     municipio.attr('disabled','disabled')
        // }
        if (id === "") {
            id = '100000';
        }
        $("#id_municipio").val(id)
    })
    provincia.change(function () {
        var id = $(this).val();
        $("#id_provincia").val(id)
        if (id === "Seleccionar provincia") {
            municipio.attr('disabled', 'disabled')
            municipio.html('')
            $("#id_municipio").val('100000')
            console.log('vacio')
            return;
        }
        if (id) {
            loader.show();
            municipio.attr('disabled', 'disabled')
            $.get('municipios_ajax?IdProvincia=' + id)
                .done(function (data) {
                    var s = '<option value="">Seleccionar municipio</option>';
                    console.log(data);
                    $.each(data.data, function (i, row) {
                        console.log(row);
                        s += '<option value="' + row.IdMunicipio + '">' + row.NombreMunicipio + '</option>'
                    })
                    municipio.removeAttr('disabled')
                    municipio.html(s);
                    loader.hide();
                    if ($("#id_municipio").val() !== '100000') {
                        console.log($("#id_municipio").val() + 'entro')
                        municipio.attr('enabled', 'enabled')
                        $('#municipioajax').val($("#id_municipio").val()).trigger("change")
                    }
                })
        }
    })
    if ($("#id_provincia").val() !== '100000') {
        $('#provincia').val($("#id_provincia").val()).trigger("change")
    }
});

$(document).ready(function () {
    $('body').on('click', '#eliminar', function (e) {
        e.preventDefault();
        var confirmed = confirm('¿Eliminar este registro?');
        var formAction = $("#formeliminar").attr('action');
        var token = $("meta[name='csrf-token']").attr("content");
        if (confirmed === true) {
            var data = { _token: token };
            $.ajax({
                type: "DELETE",
                url: formAction,
                data: data,
                dataType: 'JSON',
                cache: false,
                success: function (msg) {
                    console.log("Se ha realizado el POST con exito " + msg);
                    window.location = msg.ruta;
                }
            });
        }
        else {
        }
    });
});
/* para los datatable */
/* $(document).ready(function() {
    $('#usuario').DataTable(
         {
            "language": {
                "url": "{{ asset('js/Spanish.plug-in.1.10.16.json') }}"
                },
        }
    );
}); */