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
            for (let i=0; i<data.length; i++){
                htmlSelect += "<tr>" +
                    "<td><input id="+i+" type='checkbox' name="+i+" class='form-control'></td>" +
                    "<td>"+data[i].id_carta_porte+"</td>" +
                    "</tr>"
                $("#tablaCuentasPorPagar").html(htmlSelect)
            }
        })
        .fail(function() {
            console.log("error");
        });
}

$("#cuentasPorCobrarForm").submit(function(){
    $("#cuentasPorCobrarForm").serialize();
    //console.log('algo')
});

