function cambioAbiertaToRelease(){
    var valoresIds = inputCheckBoxChecked();
            //var status = "release";
            var token = $("#token").val();

            var request = {
                //status:status,
                valoresIds:valoresIds
            };

            $.ajax({
                url: "/cartaPorte/release",
                type: 'POST',
                headers: {'X-CSRF-TOKEN':token},
                contentType: 'application/json',
                data: JSON.stringify(request),
            })
                .done(function(data) {
                    console.log(data);
                    Swal.fire('El status cambio correctamente')
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

    //window.location.reload();
}

function inputCheckBoxChecked(){
    var contador=0;
    var valoresIds = [];
    $("#rows td").each(function(){
        if($(this).find("#release").prop('checked')){
            let valorActual = $(this).parent();
            valoresIds[contador] = valorActual.find("#idValorRelease").val();
            contador = contador + 1;
        }
    });
    //console.log( valoresIds);
    return valoresIds;
}

/*$(function () {
    $('#exampleModal').modal({backdrop: 'static', keyboard: false})
})*/


