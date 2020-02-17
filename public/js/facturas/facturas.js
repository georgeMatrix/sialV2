$(document).ready(function(){
    //cambiarStatus();
})

function cambiarStatus(){
        let fechaEstimadaPago = $("#fechaEstimadaPago").val()
        let request=[
            {
                fechaEstimadaPago: fechaEstimadaPago,
                valoresIds: inputCheckFacturas()
            }
        ];
        $.ajax({
            url: '/api/cambioStatus',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(request),
        })
            .done(function(response) {
                console.log(response.name)
                if(response.name == "Documento"){
                    var a = document.createElement("a");
                    a.href = response.file;
                    a.download = response.name;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Contrarecibo NO GENERADO!...',
                        text: 'Algunos datos ya se encuentran en revision, verifique y vuelva a intentar'
                    })
                }
            })
}

$('#formFacturas').submit(function(e){
    e.preventDefault()
    let facturas = $('#facturas').val();
    let emisor = $('#emisor').val();
    let cliente = $('#cliente').val();
    let request=[
        {facturas:facturas},
        {emisor:emisor},
        {cliente:cliente},
    ];
    let tokenFacturas = $('#tokenFacturas').val();
    ajax(request, tokenFacturas)
});

function ajax(request, tokenFacturas){
    $.ajax({
        url: '/api/getFacturas',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenFacturas},
        contentType: 'application/json',
        data: JSON.stringify(request),
    })
        .done(function(data) {
            console.log(data.length)
            console.log(data)
            let htmlSelect = ''
            let contador
            localStorage.setItem("tamRows", data.length)
            for (let i=0; i<data.length; i++){
                contador = i+1
                if(data[i].moneda == "MXN"){
                htmlSelect += "<tr id='rows"+contador+"'>" +
                    "<input id='idFactura"+contador+"' type='hidden' value="+data[i].id+">" +
                    "<td><input id='inputCheckFactura"+contador+"' onclick='inputChecked("+data.length+");' type='checkbox' name="+i+" class='form-control'></td>" +
                    "<td>"+data[i].status+"</td>"+
                    "<td>"+data[i].serie+"</td>" +
                    "<td>"+data[i].folio+"</td>" +
                    "<td>"+data[i].lugar_expedicion+"</td>" +
                    "<td>"+data[i].emisor_razon_social+"</td>" +
                    "<td>"+data[i].forma_pago+"</td>" +
                    "<td>"+data[i].moneda+"</td>" +
                    "<td>"+data[i].total+"</td>" +
                    "<td>"+data[i].tipoCambio+"</td>" +
                    "<td>"+(data[i].total)*1+"</td>" +
                    "<td>"+data[i].metodo_pago+"</td>" +
                    "<td>"+data[i].forma_pago+"</td>" +
                    "<td>"+data[i].contrarecibo+"</td>" +
                    "<td>"+data[i].revicion+"</td>"+
                    "<td>fecha de pago</td>"+

                    "</tr>"
                }
                if(data[i].moneda == "USD"){
                    htmlSelect += "<tr id='rows"+contador+"'>" +
                        "<input id='idFactura"+contador+"' type='hidden' value="+data[i].id+">" +
                        "<td><input id='inputCheckFactura"+contador+"' onclick='inputChecked("+data.length+");' type='checkbox' name="+i+" class='form-control'></td>" +
                      //"<td><input id='inputCheckFactura"+contador+"' onclick='inputChecked("+data[0].length+");' type='checkbox' name="+i+" class='form-control'></td>" +
                        "<td>"+data[i].status+"</td>"+
                        "<td>"+data[i].serie+"</td>" +
                        "<td>"+data[i].folio+"</td>" +
                        "<td>"+data[i].lugar_expedicion+"</td>" +
                        "<td>"+data[i].emisor_razon_social+"</td>" +
                        "<td>"+data[i].forma_pago+"</td>" +
                        "<td>"+data[i].moneda+"</td>" +
                        "<td>"+data[i].total+"</td>" +
                        "<td>"+data[i].tipoCambio+"</td>" +
                        "<td>"+(data[i].total)*data[i].tipoCambio+"</td>" +
                        "<td>"+data[i].metodo_pago+"</td>" +
                        "<td>"+data[i].forma_pago+"</td>" +
                        "<td>"+data[i].contrarecibo+"</td>" +
                        "<td>"+data[i].revicion+"</td>"+
                        "<td>fecha de pago</td>"+
                        "</tr>"
                }
                $("#tablafacturas").html(htmlSelect)
            }
            $("#tablafacturas").html(htmlSelect)
        })
}

function inputChecked(i) {
    console.log("llegando")
    /*for (let j = 0; j <= i ; j++) {
        if( $('#inputCheckFactura'+j).prop('checked') ) {
            $("#aplicarPago").prop("disabled", false)
            $("#generarContrarecibo").prop("disabled", false)
            break;
        }else{
            $("#aplicarPago").prop("disabled", true)
            $("#generarContrarecibo").prop("disabled", true)
        }
    }*/
}

function inputCheckFacturas(){
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
    console.log(valoresIds)
    return valoresIds;
    /*var request = {
        valoresIds:valoresIds
    };*/

    /*return $.ajax({
        url: '/api/facturar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN':tokenCuentasPorPagar},
        contentType: 'application/json',
        data: JSON.stringify(request),
    }).done(function(response) {})*/
}

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

jQuery.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Hoy",
    clear: "Borrar",
    format: "dd/mm/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};

jQuery('#fechaEstimadaPago').datepicker({
    format: "yyyy/mm/dd",
    language: "es",
    autoclose: true
});

$("#aplicarPago").click(function(){
    Swal.fire({
        title: 'Pregunta',
        text: "¿Desea aplicar pago a las facturas seleccionadas?",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Pregunta',
                text: "Esta accion no podra deshacerse, ¿desea continuar?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    let request=[
                        {
                            valoresIds: inputCheckFacturas()
                        }
                    ];
                    console.log(request)
                    $.ajax({
                        url: '/api/cambioStatusPagado',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(request),
                    }).done(function(response){
                        if (response == "error"){
                            Swal.fire({
                                type: 'warning',
                                title: 'Pago NO GENERADO!...',
                                text: 'Algunos datos NO cuentan con contrarecibo o NO se encuentran en revision, verifique y vuelva a intentar'
                            })
                        }
                    })
                }
            })
        }
    })

})
