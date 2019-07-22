$("#facturaForm").submit(function(e){
    e.preventDefault();
    var productoT = $("#producto").val();

    /*var request = {
        producto:producto,
    };*/

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        //headers: {'X-CSRF-TOKEN':token},
        //contentType: 'application/json',
        data:{producto:productoT},
        dataType:"JSON"
        //crossDomain:true,
        //data: JSON.stringify(request),
    })
        .done(function(data) {
            console.log("success");
            let urlOrigen = data.archivo_xml;
            let urlLimpia = urlOrigen.substr(5,35);
            let urlBase = "http://agentedesegurosmba.com";
            let urlCompleta = urlBase+"/facturacion"+urlLimpia;
            $("#datos").attr("href", urlCompleta);
            $("#datos").removeClass('btn-secondary')
            $("#datos").removeClass('disabled')
            $("#datos").addClass('btn-success')
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