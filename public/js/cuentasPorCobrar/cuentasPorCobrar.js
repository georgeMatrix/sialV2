/**
 * Created by GEORGE on 8/22/19.
 */

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
            console.log(data);
            let htmlSelect = ''
            let contador
            localStorage.setItem("tamRows", data[0].length)
            for (let i=0; i<data[0].length; i++){
                contador = i+1
                htmlSelect += "<tr id='rows"+contador+"'>" +
                    "<input id='idFactura"+contador+"' type='hidden' value="+data[0][i].id+">" +
                    "<td><input id='inputCheckFactura"+contador+"' onclick='inputChecked("+data[0].length+");' type='checkbox' name="+i+" class='form-control'></td>" +
                    "<td>"+data[0][i].USER_CARTA_PORTE_TIPO_ID+"</td>" +
                    // "<td>"+data[0][i].USER_CARTA_PORTE_TIPO+"</td>" +
                     "<td>"+data[1][i].id+"</td>" +
                    "<td>"+data[0][i].emisor_razon_social+"</td>" +
                    "<td>"+data[0][i].receptor_razon_social+"</td>" +
                    "<td>"+data[0][i].USER_NOMBRE_RUTA+"</td>" +
                    "<td>"+data[0][i].USER_UNIDAD+"</td>" +
                    "<td>"+data[0][i].USER_REMOLQUE+"</td>" +
                    "<td>"+data[0][i].USER_OPERADOR+"</td>" +
                    "<td>"+data[0][i].clave_prod_serv+"</td>" +
                    "<td>"+data[0][i].no_identificacion+"</td>" +
                    "<td>"+data[0][i].cantidad+"</td>" +
                    "<td>"+data[0][i].clave_unidad+"</td>" +
                    "<td>"+data[0][i].unidad+"</td>" +
                    "<td>"+data[0][i].descripcion+"</td>" +
                    "<td>"+number_format(data[0][i].valor_unitario, 2)+"</td>" +
                    "<td>"+number_format(data[0][i].importe, 2)+"</td>" +
                    "<td>"+number_format(data[0][i].cfdi_t_iva_importe, 2)+"</td>" +
                    "<td>"+number_format(data[0][i].cfdi_r_iva_importe, 2)+"</td>" +
                    "<td>"+number_format((parseInt(data[0][i].importe) + parseInt(data[0][i].cfdi_t_iva_importe))-(parseInt(data[0][i].cfdi_r_iva_importe)), 2)+"</td>" +
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
    let valorActual
    let tam = localStorage.getItem("tamRows")
    for (let i = 1; i <=tam ; i++) {
        $("#rows"+i).each(function (k, v) {
            if ($(this).find("#inputCheckFactura" + i).prop('checked')) {
                valorActual = $(this).parent();
                valoresIds[contador] = valorActual.find("#idFactura"+ i).val();
                contador ++;
            }
        });
    }
    var request = {
        valoresIds:valoresIds
    };

    return $.ajax({
        url: '/api/facturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(request),
    }).done(function(response) {})
}

$(document).ready(function(){
    $("#XMLFactura").prop("href", localStorage.getItem("direccionXML"));
    var screen = $('#loading-screen');
    configureLoadingScreen(screen);
    modal();
})

function inputChecked(i) {
    for (let j = 0; j <= i ; j++) {
        if( $('#inputCheckFactura'+j).prop('checked') ) {
            $("#facturar").prop("disabled", false)
            $("#preV").prop("disabled", false)
    break;
        }else{
            $("#facturar").prop("disabled", true)
            $("#preV").prop("disabled", true)
        }
    }
}

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

function generarPrevisualizacionFactura(){
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

    let usoCfdi = []
    let referencia = []
    let peso = []
    let tipoCambio = []
    let condicionesPago = []

    var valoresParaServer = [];

    inputCheckFacturar().done(function (response) {
        valoresParaServer[0] = response
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

        datosParaServidor[23] = valoresParaServer[0][0][0].emisor_rfc
        datosParaServidor[24] = valoresParaServer[0][0][0].emisor_razon_social
        datosParaServidor[25] = valoresParaServer[0][0][0].receptor_rfc
        datosParaServidor[26] = valoresParaServer[0][0][0].receptor_razon_social

        //OBTENER cfdi_r_iva_impuesto NUEVO CAMBIO "17"

        datosParaServidor[12] = $("#lugarExpedicion").val();
        datosParaServidor[13] = $("#metodo_pago").val();
        datosParaServidor[14] = $("#forma_pago").val();
        datosParaServidor[15] = $("#tipo_comprobante").val();
        datosParaServidor[16] = $("#moneda").val();

        datosParaServidor[27] = $("#usoCfdi").val();
        datosParaServidor[29] = $("#referencia").val();
        datosParaServidor[30] = $("#tipoCambio").val();
        datosParaServidor[31] = $("#condicionesPago").val();
        //console.log(datosParaServidor)
        //$("#cartaPortePre").text("hola")
        organizacionModalPrevisualizacion(datosParaServidor)
    })
}

function organizacionModalPrevisualizacion(datosParaServidor){
    console.log(datosParaServidor)
    $("#cantidad").empty()
    let tamPre = datosParaServidor[0].length
    let emisorRfc;
    for (let i = 0; i < tamPre ; i++) {
        if(datosParaServidor[23] == 1 || datosParaServidor[24]){
            emisorRfc = "RUBEN GUTIERREZ VELAZCO"
        }else{
            emisorRfc = "TRANSPORTES LOGIEXPRESS SA DE CV"
        }
        $("#cantidad").append("<h5>Concepto No. "+(i+1)+"<br></h5>" +
            "<label><b>Cantidad: </b></label>" +
            "<label>"+datosParaServidor[0][i]+"</label><br>" +
            "<label><b>Unidad: </b></label>" +
            "<label>"+datosParaServidor[1][i]+"</label><br>" +
            "<label><b>descripcion: </b></label>" +
            "<label>"+datosParaServidor[2][i]+"</label><br>" +
            "<label><b>Valor Unitario: </b></label>" +
            "<label>"+datosParaServidor[3][i]+"</label><br>" +
            "<label><b>Importe: </b></label>" +
            "<label>"+datosParaServidor[4][i]+"</label><br>" +
            "<label><b>clave Producto Servicio: </b></label>" +
            "<label>"+datosParaServidor[5][i]+"</label><br>" +
            "<label><b>Clave Unidad: </b></label>" +
            "<label>"+datosParaServidor[6][i]+"</label><br>" +
            "<label><b>cfdiTIvaBase: </b></label>" +
            "<label>"+datosParaServidor[7][i]+"</label><br>" +
            "<label><b>cfdiTIvaImpuesto: </b></label>" +
            "<label>"+datosParaServidor[8][i]+"</label><br>" +
            "<label><b>cfdiTIvaTipoFactor: </b></label>" +
            "<label>"+datosParaServidor[9][i]+"</label><br>" +
            "<label><b>cfdiTIvaTasacuota: </b></label>" +
            "<label>"+datosParaServidor[10][i]+"</label><br>" +
            "<label><b>cfdiTIvaImporte: </b></label>" +
            "<label>"+datosParaServidor[11][i]+"</label><br>" +
            "<label><b>Metodo de Pago: </b></label>" +
            "<label>"+datosParaServidor[13]+"</label><br>" +
            "<label><b>Forma de Pago: </b></label>" +
            "<label>"+datosParaServidor[14]+"</label><br>" +
            "<label><b>Tipo de comprobante: </b></label>" +
            "<label>"+datosParaServidor[15]+"</label><br>" +
            "<label><b>Moneda: </b></label>" +
            "<label>"+datosParaServidor[16]+"</label><br>" +
            "<label><b>Emisor RFC: </b></label>" +
            "<label>"+emisorRfc+"</label><br>" +
            "<label><b>Emisor Razon Social: </b></label>" +
            "<label>"+emisorRfc+"</label><br>" +
            "<label><b>Receptor RFC: </b></label>" +
            "<label>"+datosParaServidor[25]+"</label><br>" +
            "<label><b>Receptor razon social: </b></label>" +
            "<label>"+datosParaServidor[26]+"</label><br>" +
            "<label><b>Uso Cfdi: </b></label>" +
            "<label>"+datosParaServidor[27]+"</label><br>" +
            "<label><b>Referencia: </b></label>" +
            "<label>"+datosParaServidor[29]+"</label><br>" +
            "<label><b>Tipo de cambio: </b></label>" +
            "<label>"+datosParaServidor[30]+"</label><br>" +
            "<label><b>Condiciones Pago: </b></label>" +
            "<label>"+datosParaServidor[31]+"</label><br>" +
            "<hr>")
    }
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

    let usoCfdi = []
    let referencia = []
    let peso = []
    let tipoCambio = []
    let condicionesPago = []


    var valoresParaServer = [];
    inputCheckFacturar().done(function(response){
        valoresParaServer[0] = response


    //-----------------Solo para visializacion------------------------
    valoresParaServer[1] = $("#lugarExpedicion").val();
    valoresParaServer[2] = $("#metodo_pago").val();
    valoresParaServer[3] = $("#forma_pago").val();
    valoresParaServer[4] = $("#tipo_comprobante").val();
    valoresParaServer[5] = $("#moneda").val();
    valoresParaServer[6] = $("#usoCfdi").val();
    valoresParaServer[7] = $("#peso").val();
    valoresParaServer[8] = $("#referencia").val();
    valoresParaServer[9] = $("#tipoCambio").val();
    valoresParaServer[10] = $("#condicionesPago").val();
    //-----------------Solo para visializacion------------------------
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

    datosParaServidor[23] = valoresParaServer[0][0][0].emisor_rfc
    datosParaServidor[24] = valoresParaServer[0][0][0].emisor_razon_social
    datosParaServidor[25] = valoresParaServer[0][0][0].receptor_rfc
    datosParaServidor[26] = valoresParaServer[0][0][0].receptor_razon_social

    //OBTENER cfdi_r_iva_impuesto NUEVO CAMBIO "17"

    datosParaServidor[12] = $("#lugarExpedicion").val();
    datosParaServidor[13] = $("#metodo_pago").val();
    datosParaServidor[14] = $("#forma_pago").val();
    datosParaServidor[15] = $("#tipo_comprobante").val();
    datosParaServidor[16] = $("#moneda").val();

    datosParaServidor[27] = $("#usoCfdi").val();
    datosParaServidor[28] = $("#peso").val();
    datosParaServidor[29] = $("#referencia").val();
    datosParaServidor[30] = $("#tipoCambio").val();
    datosParaServidor[31] = $("#condicionesPago").val();

    guardaFacturaEnFacturables(valoresParaServer, datosParaServidor, tamArreglo)
    })
}

function guardaFacturaEnFacturables(valoresParaServer, datosParaServidor, tamArreglo){
    $.ajax({
        url: '/api/guardarFacturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(valoresParaServer),
    }).done(function(idFactura) {
        console.log("id Factura: "+idFactura)
        generarXML(datosParaServidor, tamArreglo, idFactura)
    })
}

function generarXML(valores, tam, idFactura){

    /*$.each(valores, function(k, v){
        console.log("valor del datos desde el front: nombre: "+k+"valor: "+v);
    })*/
    let request = {valoresParaServidor: valores, noConceptos:tam, idFactura: idFactura}
    $.ajax({
        //cache: false,
        url: 'facturacion/ejemplos/cfdi33/ejemplo_factura-SERVER.php',        //local
        //url: 'facturacion/ejemplos/cfdi33/ejemplo_factura-SERVER.php', //SERVER
        type: 'POST',
        //contentType: 'json',
        data: request,
    })
        .done(function(factura){
            let valoresCovertidos = JSON.parse(factura)
            guardadoFactura(factura, valoresCovertidos[0].Folio)

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

function guardadoFactura(datosDeFactura, idFactura) {
    console.log("GUARDADO DE DACTURA:")
    console.log(JSON.parse(datosDeFactura))
    let datosConvertidos = JSON.parse(datosDeFactura)
    let request = {datosDeFactura: datosConvertidos}
    $.ajax({
        url: 'api/guardarFactura',
        type: 'POST',
        contentType: 'application/json',
        //data: request,
        data: JSON.stringify(request),
        //data: datosDeFactura,
    }).done(function (response) {
        $("#XMLFactura").prop("href", "facturacion\\timbrados\\cfdi_factura"+idFactura+".xml");
        localStorage.setItem("direccionXML", "facturacion\\timbrados\\cfdi_factura"+idFactura+".xml");
        Swal.fire(
            'Documento creado correctamente',
        )
        excelFacturaPrueba(response)
    })

}

/*function pdfFactura(valores, idFactura){
    //console.log(valores)
    //console.log("========================================")
    let request = {valoresParaServidor: valores, idFactura: idFactura}
    $.ajax({
        url: 'api/uno',        //local
        type: 'get',
        data: request,
    }).done(function(response) {
            $("#XMLFactura").prop("href", "facturacion\\timbrados\\cfdi_factura"+idFactura+".xml");
        localStorage.setItem("direccionXML", "facturacion\\timbrados\\cfdi_factura"+idFactura+".xml");
        Swal.fire(
            'El EXCEL se creo correctamente',
        )
        //console.log("EXCEL listo!!!")
        excelFacturaPrueba(idFactura);
    }).fail( function( jqXHR, textStatus, errorThrown ) {

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
}*/

function excelFacturaPrueba(idFactura){
    let request = {idFactura: idFactura}
    $.ajax({
        url: 'api/excelFactura',        //local
        type: 'POST',
        data: request,
    }).done(function(response){
        var a = document.createElement("a");
        a.href = response.file;
        a.download = response.name;
        document.body.appendChild(a);
        a.click();
        a.remove();
        //console.log(response)
        //location.reload();
    })
}
