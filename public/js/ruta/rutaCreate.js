$(document).ready(function() {
    inputImporte();
    rutas();
    facturas();
    datosCxP();
    //var resultadoActividades = actividadesConsulta();
    /*resultadoActividades.done(function(datos){
        console.log(datos)
    })*/
});
function rutas(){
    $("#rutasForm").submit(function(e){
        e.preventDefault();
        var clientes = $('#clientes').val();
        var nombre = $('#nombre').val();
        var lugar_exp = $('#lugar_exp').val();
        var origen = $('#origen').val();
        var remitente = $('#remitente').val();
        var dom_remitente = $('#dom_remitente').val();
        var recoge = $('#recoge').val();
        var valor_declarado = $('#valor_declarado').val();
        var destino = $('#destino').val();
        var destinatario = $('#destinatario').val();
        var dom_destinatario = $('#dom_destinatario').val();
        var entrega = $('#entrega').val();
        var fecha_entrega = $('#fecha_entrega').val();
        var cantidad = $('#cantidad').val();
        var embalaje = $('#embalaje').val();
        var concepto = $('#concepto').val();
        var material_peligroso = $('#material_peligroso').val();
        var indemnizacion = $('#indemnizacion').val();
        var importe = $('#importe').val();
        var asignacion_precio = $('#asignacion_precio').val();
        var obs = $('#obs').val();
        var dias_re = $('#dias_re').val();

        /*=====DATOS DE ACTIVIDAD======*/
        var fecha = $('#fecha').val();
        var ref = $('#ref').val();
        var tabla = $('#tabla').val();
        var status = $('#status').val();
        var descripcion = $('#descripcion').val();
        var usuario = $('#usuario').val();
        /*=====DATOS DE ACTIVIDAD======*/

        var token = $('#tokenFormRutas').val();
        var tokenActividad = $('#tokenActividad').val();
        var request = {
            clientes:clientes,
            nombre:nombre,
            lugar_exp:lugar_exp,
            origen:origen,
            remitente:remitente,
            dom_remitente:dom_remitente,
            recoge:recoge,
            valor_declarado:valor_declarado,
            destino:destino,
            destinatario:destinatario,
            dom_destinatario:dom_destinatario,
            entrega:entrega,
            fecha_entrega:fecha_entrega,
            cantidad:cantidad,
            embalaje:embalaje,
            concepto:concepto,
            material_peligroso:material_peligroso,
            indemnizacion:indemnizacion,
            importe:importe,
            asignacion_precio:asignacion_precio,
            obs:obs,
            dias_re:dias_re,
        };

        var requestActividad = {
            fecha:fecha,
            ref:ref,
            tabla:tabla,
            status:status,
            descripcion:descripcion,
            usuario:usuario
        };

        $.ajax({
            url: "../actividad",
            type: 'POST',
            headers: {'X-CSRF-TOKEN':tokenActividad},
            contentType: 'application/json',
            data: JSON.stringify(requestActividad),
        })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            headers: {'X-CSRF-TOKEN':token},
            contentType: 'application/json',
            data: JSON.stringify(request),
        })
            .done(function() {
                console.log("success");
                Swal.fire('Dato Guardado')

                $.get('/api/uno', function (data) {
                    var html_select = '';
                    for (var i=0; i<data.length; i++){
                        html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $("#rutasSelect").html(html_select)
                });

                $.get('/api/uno', function (data) {
                    var html_select = '';
                    for (var i=0; i<data.length; i++){
                        html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $("#rutasCxP").html(html_select)
                })

                $("#nombre").val("");
                $('#clientes').prop('selectedIndex',0);
                $('#asignacion_precio').prop('selectedIndex',0);
                $('#dias_re').prop('selectedIndex',0);
                $("#facturador").val("");
                $("#lugar_exp").val("");
                $("#origen").val("");
                $("#remitente").val("");
                $("#dom_remitente").val("");
                $("#recoge").val("");
                $("#valor_declarado").val("");
                $("#destino").val("");
                $("#destinatario").val("");
                $("#dom_destinatario").val("");
                $("#entrega").val("");
                $("#fecha_entrega").val("");
                $("#cantidad").val("");
                $("#embalaje").val("");
                $("#concepto").val("");
                $("#material_peligroso").val("");
                $("#indemnizacion").val("");
                $("#importe").val("");
                $("#obs").val("");

            })
            .fail( function( jqXHR, textStatus, errorThrown ) {

                if (jqXHR.status === 0) {

                    console.log('Not connect: Verify Network.');

                } else if (jqXHR.status == 404) {

                    console.log('Requested page not found [404]');

                } else if (jqXHR.status == 500) {

                    console.log('Internal Server Error [500].');

                } else if (textStatus === 'parsererror') {

                    console.log('Requested JSON parse failed.');

                } else if (textStatus === 'timeout') {

                    console.log('Time out error.');

                } else if (textStatus === 'abort') {

                    console.log('Ajax request aborted.');

                } else {

                    console.log('Uncaught Error: ' + jqXHR.responseText);

                }

            });

    });
}

function facturas(){
    $("#dFacturacionForm").submit(function(e){
        e.preventDefault();
        var rutas = $("#rutasSelect").val();
        var facturador = $('#facturador').val();
        var clientes = $('#clientesF').val();
        var asignacionPrecio = $("#asignacionPrecio").val();
        var claveProdServ = $("#claveProdServ").val();
        var noIdentificacion = $("#noIdentificacion").val();
        var cantidad = $("#cantidadDfacturacion").val();
        var claveUnidad = $("#claveUnidad").val();
        var unidad = $("#unidad").val();
        var descripcion = $("#descripcionF").val();
        var valorUnitario = $("#valorUnitario").val();
        var importe = cantidad * valorUnitario;
        var tIva = $("#tIva").val();
        var tIsr = $("#tIsr").val();
        var rIva = $("#rIva").val();
        var rIsr = $("#rIsr").val();
        var token = $('#tokenFormDfacturacion').val();

        var tokenActividadDfacturacion = $('#tokenDfacturacionActividad').val();

        /*=====DATOS DE ACTIVIDAD======*/
        var fechaDfacturacion = $("#fechaDfacturacion").val();
        var refDfacturacion = $("#refDfacturacion").val();
        var tablaDfacturacion = $("#tablaDfacturacion").val();
        var statusDfacturacion = $("#statusDfacturacion").val();
        var descripcionDfacturacion = $("#descripcionDfacturacion").val();
        var usuarioDfacturacion = $("#usuarioDfacturacion").val();
        /*=====DATOS DE ACTIVIDAD======*/

        var request = {
            rutas:rutas,
            facturador:facturador,
            clientes:clientes,
            asignacionPrecio:asignacionPrecio,
            claveProdServ:claveProdServ,
            noIdentificacion:noIdentificacion,
            cantidad:cantidad,
            claveUnidad:claveUnidad,
            unidad:unidad,
            descripcion:descripcion,
            valorUnitario:valorUnitario,
            importe:importe,
            tIva:tIva,
            tIsr:tIsr,
            rIva:rIva,
            rIsr:rIsr
        };

        var requestDfacturacion = {
            fecha:fechaDfacturacion,
            ref:refDfacturacion,
            tabla:tablaDfacturacion,
            status:statusDfacturacion,
            descripcion:descripcionDfacturacion,
            usuario:usuarioDfacturacion
        };

        $.ajax({
            url: "../actividad",
            type: 'POST',
            headers: {'X-CSRF-TOKEN':tokenActividadDfacturacion},
            contentType: 'application/json',
            data: JSON.stringify(requestDfacturacion),
        })
            .done(function() {
                console.log("success");
                Swal.fire('Dato Guardado')
            })
            .fail( function( jqXHR, textStatus, errorThrown ) {

                if (jqXHR.status === 0) {

                    console.log('Not connect: Verify Network.');

                } else if (jqXHR.status == 404) {

                    console.log('Requested page not found [404]');

                } else if (jqXHR.status == 500) {

                    console.log('Internal Server Error [500].');

                } else if (textStatus === 'parsererror') {

                    console.log('Requested JSON parse failed.');

                } else if (textStatus === 'timeout') {

                    console.log('Time out error.');

                } else if (textStatus === 'abort') {

                    console.log('Ajax request aborted.');

                } else {

                    console.log('Uncaught Error: ' + jqXHR.responseText);

                }

            });

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            headers: {'X-CSRF-TOKEN':token},
            contentType: 'application/json',
            data: JSON.stringify(request),
        })
            .done(function(data) {
                console.log("success");
                console.log(data);
                //Swal.fire('Dato Guardado')

                $('#rutasSelect').prop('selectedIndex',0);
                $('#facturador').val("");
                $('#asignacionPrecio').prop('selectedIndex',0);
                $('#clientesF').prop('selectedIndex',0);
                $("#claveProdServ").val("");
                $("#noIdentificacion").val("");
                $("#cantidadDfacturacion").val("");
                $("#claveUnidad").val("");
                $("#unidad").val("");
                $("#descripcionF").val("");
                $("#valorUnitario").val("");
                $("#importeF").val("");
                $("#tIva").val("");
                $("#tIsr").val("");
                $("#rIva").val("");
                $("#rIsr").val("");


            })
            .fail( function( jqXHR, textStatus, errorThrown ) {

                if (jqXHR.status === 0) {

                    console.log('Not connect: Verify Network.');

                } else if (jqXHR.status == 404) {

                    console.log('Requested page not found [404]');

                } else if (jqXHR.status == 500) {

                    console.log('Internal Server Error [500].');

                } else if (textStatus === 'parsererror') {

                    console.log('Requested JSON parse failed.');

                } else if (textStatus === 'timeout') {

                    console.log('Time out error.');

                } else if (textStatus === 'abort') {

                    console.log('Ajax request aborted.');

                } else {

                    console.log('Uncaught Error: ' + jqXHR.responseText);

                }

            });
    });
}

function inputImporte(){
    $("#valorUnitario").focusout(function(){
        let importeDatosFacturacion = $("#cantidadDfacturacion").val()*$("#valorUnitario").val();
        $("#importeF").val(importeDatosFacturacion)
    });
    $("#cantidadDfacturacion").focusout(function(){
        let importeDatosFacturacion = $("#cantidadDfacturacion").val()*$("#valorUnitario").val();
        $("#importeF").val(importeDatosFacturacion)
    });
}

function actividadesConsulta(){
    var resultado = [];
    return $.get('/api/evaluacion', function (data) {
        $.each(data, function(index, value){
            resultado[index];
        })
    });
}

function datosCxP(){
    var resultadoActividades = actividadesConsulta();
    $("#datosCxP").submit(function(e){
        e.preventDefault();
        var ruta = $('#rutasCxP').val();
        var concepto = $('#conceptoCxP').val();
        var asignacionPrecio = $('#asignacionPrecioCxP').val();
        var claveProdServ = $('#claveProdServCxP').val();
        var noIdentificacion = $('#noIdentificacionCxP').val();
        var cantidadCxP = $('#cantidadCxP').val();
        var claveUnidad = $('#claveUnidadCxP').val();
        var unidad = $('#unidadCxP').val();
        var descripcion = $('#descripcionCxP').val();
        var valorUnitario = $('#valorUnitarioCxP').val();
        var importeCxP = $('#importeCxP').val();
        var tivaCxP = $('#tivaCxP').val();
        var tisrCxP = $('#tisrCxP').val();
        var rivaCxP = $('#tisrCxP').val();
        var risrCxP = $('#risrCxP').val();
        var token = $('#tokenFormDatosCxP').val();

        var tokenActividadDCxP = $('#tokenDCxP').val();

        /*=====DATOS DE ACTIVIDAD======*/
        var fechaDCxP = $("#fechaDCxP").val();
        var refDCxP = $("#refDCxP").val();
        var tablaDCxP = $("#tablaDCxP").val();
        var statusDCxP = $("#statusDCxP").val();
        var descripcionDCxP = $("#descripcionDCxP").val();
        var usuarioDCxP = $("#usuarioDCxP").val();
        /*=====DATOS DE ACTIVIDAD======*/

        var request = {
            ruta:ruta,
            concepto:concepto,
            asignacionPrecio:asignacionPrecio,
            claveProdServ:claveProdServ,
            noIdentificacion:noIdentificacion,
            cantidad:cantidadCxP,
            claveUnidad:claveUnidad,
            unidad:unidad,
            descripcion:descripcion,
            valorUnitario:valorUnitario,
            importe:importeCxP,
            tivaCxP:tivaCxP,
            tisrCxP:tisrCxP,
            rivaCxP:rivaCxP,
            risrCxP:risrCxP
        }

        var requestDfacturacion = {
            fecha:fechaDCxP,
            ref:refDCxP,
            tabla:tablaDCxP,
            status:statusDCxP,
            descripcion:descripcionDCxP,
            usuario:usuarioDCxP
        };

        var actividadBD = '';
        var actividadRequest = request.ruta+request.concepto+request.asignacionPrecio;
        var banderaActividad = 0;

        resultadoActividades.done(function(datos){
            for (var i=1; i<datos.length; i++){
                actividadBD = datos[i].ruta+datos[i].concepto+datos[i].asignacionPrecio;
                if(actividadBD === actividadRequest){
                    banderaActividad = 1
                }
            }
        });

        if (banderaActividad == 0){
            console.log("se agrega")


//======SI PASAN LA PRUEBA HACER ESTAS PETICIONES========//
            //ACTIVIDAD
            $.ajax({
                url: "../actividad",
                type: 'POST',
                headers: {'X-CSRF-TOKEN':tokenActividadDCxP},
                contentType: 'application/json',
                data: JSON.stringify(requestDfacturacion),
            })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                });
            //DATOS CUENTAS POR PAGAR
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                headers: {'X-CSRF-TOKEN':token},
                contentType: 'application/json',
                data: JSON.stringify(request),
            })
                .done(function() {
                    resultadoActividades = actividadesConsulta();
                    console.log("success");
                    Swal.fire('Dato Guardado')
                    $('#ruta').prop('selectedIndex',0);
                    $('#concepto').val("")
                    $('#asignacionPrecio').prop('selectedIndex',0);
                    $('#claveProdServCxP').val("")
                    $('#noIdentificacionCxP').val("")
                    $('#cantidadCxP').val("")
                    $('#claveUnidadCxP').val("")
                    $('#unidadCxP').val("")
                    $('#descripcionCxP').val("")
                    $('#valorUnitarioCxP').val("")
                    $('#importeCxP').val("")
                    $('#tivaCxP').val("")
                    $('#tisrCxP').val("")
                    $('#rivaCxP').val("")
                    $('#risrCxP').val("")
                })
                .fail( function( jqXHR, textStatus, errorThrown ) {

                    if (jqXHR.status === 0) {

                        console.log('Not connect: Verify Network.');

                    } else if (jqXHR.status == 404) {

                        console.log('Requested page not found [404]');

                    } else if (jqXHR.status == 500) {

                        console.log('Internal Server Error [500].');

                    } else if (textStatus === 'parsererror') {

                        console.log('Requested JSON parse failed.');

                    } else if (textStatus === 'timeout') {

                        console.log('Time out error.');

                    } else if (textStatus === 'abort') {

                        console.log('Ajax request aborted.');

                    } else {

                        console.log('Uncaught Error: ' + jqXHR.responseText);

                    }

                });
//======SI PASAN LA PRUEBA HACER ESTAS PETICIONES========//
        }else
        {
            Swal.fire({
                type: 'error',
                title: 'Dato Repetido!',
                text: 'Los datos que quiere ingresar en Ruta, Concepto y Asignacion de Precio ya se ingresaron previamente'
            })

            $('#ruta').prop('selectedIndex',0);
            $('#concepto').val("")
            $('#asignacionPrecio').prop('selectedIndex',0);
            $('#claveProdServCxP').val("")
            $('#noIdentificacionCxP').val("")
            $('#cantidadCxP').val("")
            $('#claveUnidadCxP').val("")
            $('#unidadCxP').val("")
            $('#descripcionCxP').val("")
            $('#valorUnitarioCxP').val("")
            $('#importeCxP').val("")
            $('#tivaCxP').val("")
            $('#tisrCxP').val("")
            $('#rivaCxP').val("")
            $('#risrCxP').val("")
        }
    });
}