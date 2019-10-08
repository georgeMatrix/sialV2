
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
    var valoresParaServer = [];
    valoresParaServer[0] = inputCheckFacturar()
    valoresParaServer[1] = $("#lugarExpedicion").val();
    valoresParaServer[2] = $("#metodo_pago").val();
    valoresParaServer[3] = $("#forma_pago").val();
    valoresParaServer[4] = $("#tipo_comprobante").val();
    valoresParaServer[5] = $("#moneda").val();

    $.ajax({
        url: '/api/guardarFacturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(valoresParaServer),
    }).done(function(data) {
        console.log('regreso del guardado')
        console.log(data)
        $producto = 'CALABAZA PARA DIA DE MUERTOS'
        serverExterno()
    })

    //console.log(valoresParaServer);
    //console.log(tamInputCheckFacturar)
}

function serverExterno(){

    /*var producto = {
        producto: datosServer
    };*/

    $.ajax({
        //url: 'http://agentedesegurosmba.com/facturacion/ejemplos/cfdi33/ejemplo_factura - copia.php',
        url: '/facturacion/ejemplos/cfdi33/ejemplo_factura - copia.php',
        type: 'POST',
        //headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        //contentType: 'text/html',
        dataType: "xml",
        data: {producto: 'RAYZER'},
    }).done(function(data) {
        console.log('respuesta del server');
        console.log(data);
        var xmlDoc = $.parseXML( data );
        var xml = $( xmlDoc );
        var title = xml.find( "URL" );
        console.log(title);
    });

    // let data = new FormData();
    // data.append('producto', 'RAYZER');
    // fetch('/facturacion/ejemplos/cfdi33/ejemplo_factura - copia.php', {
    //     method: 'POST',
    //     body:data
    // })
    //     /*.then(function(response){
    //         if (response.ok){
    //            return response.text()
    //         }
    //         else{
    //             throw "error aqui"
    //         }
    //     })*/
    //     .then(function(data){
    //         /*let parser = new DOMParser(),
    //
    //             xmlDoc = parser.parseFromString(data, 'text/xml');*/
    //         console.log(data)
    //     })
    //     .catch(function(error){
    //         console.log(error)
    //     })
}