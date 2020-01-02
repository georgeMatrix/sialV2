
/**
 * Created by GEORGE on 8/22/19.
 */
var valoresGlobales = [];

$('#formCuentasPorPagar').submit(function(e){
    e.preventDefault()
    let facturador = $('#facturadorCuentasPorPagar').val();
    let cliente = $('#clienteCuentasPorPagar').val();
    let request=[
        {facturador:facturador},
        {cliente:cliente}
        ];
    let tokenCuentasPorPagar = $('#tokenCuentasPorPagar').val();
    ajax(request, tokenCuentasPorPagar)
});

function ajax(request, tokenCuentasPorPagar){
    $.ajax({
        url: '/api/cuentasPorCobrarV2',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(request),
    })
        .done(function(data) {
            //console.log(data);
            let htmlSelect = ''
            for (let i=0; i<data.length; i++){
                htmlSelect += "<tr id='rows'>" +
                    "<input id='idFactura' type='hidden' value="+data[i].id+">" +
                    "<td><input id='inputCheckFactura' type='checkbox' name="+i+" class='form-control'></td>" +
                    "<td>"+data[i].USER_CARTA_PORTE_TIPO_ID+"</td>" +
                    "<td>"+data[i].USER_CARTA_PORTE_TIPO+"</td>" +
                    "<td>"+data[i].emisor_razon_social+"</td>" +
                    "<td>"+data[i].receptor_razon_social+"</td>" +
                    "<td>"+data[i].USER_NOMBRE_RUTA+"</td>" +
                    "<td>"+data[i].USER_UNIDAD+"</td>" +
                    "<td>"+data[i].USER_REMOLQUE+"</td>" +
                    "<td>"+data[i].USER_OPERADOR+"</td>" +
                    "<td>"+data[i].clave_prod_serv+"</td>" +
                    "<td>"+data[i].no_identificacion+"</td>" +
                    "<td>"+data[i].cantidad+"</td>" +
                    "<td>"+data[i].clave_unidad+"</td>" +
                    "<td>"+data[i].unidad+"</td>" +
                    "<td>"+data[i].descripcion+"</td>" +
                    "<td>"+number_format(data[i].valor_unitario, 2)+"</td>" +
                    "<td>"+number_format(data[i].importe, 2)+"</td>" +
                    "<td>"+number_format(data[i].cfdi_t_iva_importe, 2)+"</td>" +
                    "<td>"+number_format(data[i].cfdi_r_iva_importe, 2)+"</td>" +
                    "<td>"+number_format((parseInt(data[i].importe) + parseInt(data[i].cfdi_t_iva_importe))-(parseInt(data[i].cfdi_r_iva_importe)), 2)+"</td>" +
                    "</tr>"
                $("#tablaCuentasPorPagar").html(htmlSelect)
                //console.log(htmlSelect)
            }
            $("#tablaCuentasPorPagar").html(htmlSelect)
        })
        .fail(function() {
            console.log("error");
        });
}

$("#cuentasPorCobrarForm").submit(function(){
    $("#cuentasPorCobrarForm").serialize();
});

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

function inputCheckFacturar(){
    var contador=0;
    var valoresIds = [];
    $("#rows td").each(function(){
        /*==============================
        /*EL DETALLE ES QUE SOLO ENCUENTRA UN nombre de inputCheckFactura*/
        /*datosParaFacturar es la funcion que esta en CuentasPorCobrarV2
        /*==============================*/
        if($(this).find("#inputCheckFactura").prop('checked')){
            let valorActual = $(this).parent();
            valoresIds[contador] = valorActual.find("#idFactura").val();
            contador = contador + 1;
        }
    });
console.log(valoresIds)

    var request = {
        valoresIds:valoresIds
    };

    $.ajax({
        url: '/api/facturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(request),
    }).done(function(data) {
        //console.log(data)
        valoresGlobales = data;
    })
    return valoresGlobales
}

function generarFactura(){
    let noConceptos
    let tamArreglo
    let cantidad = []
    let unidad = []
    let descripcion = []
    let valorUnitario = []
    let importe = []
    let claveProdServ = []
    let claveUnidad = []
    let datosParaServidor = []
    let cfdiTIvaBase = []

    let cfdiTIvaImpuesto = []
    let cfdiTIvaTipoFactor = []
    let cfdiTIvaTasacuota = []
    let cfdiTIvaImporte = []

    let cfdiRIvaImpuesto = []
    let cfdiRIvaImporte = []
    let cfdiRIvaBase = []
    let cfdiRIvaTasacuota = []
    let cfdiRIvaTipofactor = []
    let idFacturables = []

    var valoresParaServer = [];
    valoresParaServer[0] = inputCheckFacturar()
    //-----------------Solo para visializacion------------------------
    valoresParaServer[1] = $("#lugarExpedicion").val();
    valoresParaServer[2] = $("#metodo_pago").val();
    valoresParaServer[3] = $("#forma_pago").val();
    valoresParaServer[4] = $("#tipo_comprobante").val();
    valoresParaServer[5] = $("#moneda").val();
    //-----------------Solo para visializacion------------------------

    $.ajax({
        url: '/api/guardarFacturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(valoresParaServer),
    }).done(function(facturables) {
        console.log("---------------------------------------")
        console.log('valores de la tabla facturables')
        console.log(facturables)
        console.log("---------------------------------------")
        //serverExterno()
        tamArreglo = valoresParaServer[0].length
        for (let i = 0; i < tamArreglo ; i++) {
            cantidad[i] = valoresParaServer[0][i][0].cantidad
            unidad[i] = valoresParaServer[0][i][0].unidad
            descripcion[i] = valoresParaServer[0][i][0].descripcion
            valorUnitario[i] = valoresParaServer[0][i][0].valor_unitario
            importe[i] = valoresParaServer[0][i][0].importe
            claveProdServ[i] = valoresParaServer[0][i][0].clave_prod_serv
            claveUnidad[i] = valoresParaServer[0][i][0].clave_unidad
            cfdiTIvaBase[i] = valoresParaServer[0][i][0].cfdi_t_iva_base
            cfdiTIvaImpuesto[i] = valoresParaServer[0][i][0].cfdi_t_iva_impuesto
            cfdiTIvaTipoFactor[i] = valoresParaServer[0][i][0].cfdi_t_iva_tipofactor
            cfdiTIvaTasacuota[i] = valoresParaServer[0][i][0].cfdi_t_iva_tasacuota
            cfdiTIvaImporte[i] = valoresParaServer[0][i][0].cfdi_t_iva_importe

            cfdiRIvaImpuesto[i] = valoresParaServer[0][i][0].cfdi_r_iva_impuesto
            cfdiRIvaImporte[i] = valoresParaServer[0][i][0].cfdi_r_iva_importe
            cfdiRIvaBase[i] = valoresParaServer[0][i][0].cfdi_r_iva_base
            cfdiRIvaTasacuota[i] = valoresParaServer[0][i][0].cfdi_r_iva_tasacuota
            cfdiRIvaTipofactor[i] = valoresParaServer[0][i][0].cfdi_r_iva_tipofactor
            idFacturables[i] = valoresParaServer[0][i][0].id
        }
        datosParaServidor[0] = cantidad
        datosParaServidor[1] = unidad
        datosParaServidor[2] = descripcion
        datosParaServidor[3] = valorUnitario
        datosParaServidor[4] = importe
        datosParaServidor[5] = claveProdServ
        datosParaServidor[6] = claveUnidad
        datosParaServidor[7] = cfdiTIvaBase
        datosParaServidor[8] = cfdiTIvaImpuesto
        datosParaServidor[9] = cfdiTIvaTipoFactor
        datosParaServidor[10] = cfdiTIvaTasacuota
        datosParaServidor[11] = cfdiTIvaImporte

        datosParaServidor[17] = cfdiRIvaImpuesto
        datosParaServidor[18] = cfdiRIvaImporte
        datosParaServidor[19] = cfdiRIvaBase
        datosParaServidor[20] = cfdiRIvaTasacuota
        datosParaServidor[21] = cfdiRIvaTipofactor
        datosParaServidor[22] = idFacturables
        //OBTENER cfdi_r_iva_impuesto NUEVO CAMBIO "17"

        datosParaServidor[12] = $("#lugarExpedicion").val();
        datosParaServidor[13] = $("#metodo_pago").val();
        datosParaServidor[14] = $("#forma_pago").val();
        datosParaServidor[15] = $("#tipo_comprobante").val();
        datosParaServidor[16] = $("#moneda").val();

        console.log(datosParaServidor[0])

        /*$.each(datosParaServidor, function(k, v){
            $.each(v, function(k1, v1){
                console.log("datosParaServidor key: "+k1+" valor: "+v1)
            })
        })*/

        generarXML(datosParaServidor, tamArreglo, facturables)
    })
}

function generarXML(valores, tam, facturables){

    /*$.each(valores, function(k, v){
        console.log("valor del datos desde el front: nombre: "+k+"valor: "+v);
    })*/

    let request = {valoresParaServidor: valores, noConceptos:tam, facturables: facturables}
    $.ajax({
        //cache: false,
        url: 'facturacion/ejemplos/cfdi33/ejemplo_factura-SERVER.php',        //local
        //url: 'facturacion/ejemplos/cfdi33/ejemplo_factura-SERVER.php', //SERVER
        type: 'POST',
        //dataType: 'json',
        data: request,
    })
        .done(function(factura){
            console.log("Factura")
            console.log(factura);
            pdfFactura(valores);
            //alert(factura);

        })
        .fail( function( jqXHR, textStatus, errorThrown ) {

        if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

        } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

        } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

        } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

        } else if (textStatus === 'timeout') {

            alert('Time out error.');

        } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');
        } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

        }

    });
}

function pdfFactura(valores){
    let request = {valoresParaServidor: valores}
    $.ajax({
        url: '/facturacion/ejemplos/modulos/ejemplo_modulo_html2pdf.php',        //local
        type: 'post',
        data: request,
    }).done(function(response) {
        $("#pdfFactura").prop("disabled", false)
        $.each(valores[22], function(index, value){
            $("#pdfFactura").prop("href", "facturacion\\pdf\\factura_"+value+".pdf");
        })
        Swal.fire(
            'El PDF se creo correctamente',
        )
        console.log("pdf listo!!!")
    });
}

$(document).ready(function(){
    var screen = $('#loading-screen');
    configureLoadingScreen(screen);
    modal();
})

function modal(){
    $("#formModalFactura").submit(function (e) {
        return false;
    })
}

function configureLoadingScreen(screen){
    $(document)
        .ajaxStart(function () {
            screen.fadeIn();
        })
        .ajaxStop(function () {
            screen.fadeOut();
        });
}