
$(document).ready(function() {
    //cambioDeClientesInicio();
    $("#clientes").change(cambioDeClientes);
});



function cambioDeClientes(){
    var clientesId = $(this).val();
    $.get('/api/rutasClientes/'+clientesId+'/cartaPorte', function (data) {
        var html_select = '';
        for (var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $("#rutas").html(html_select);
        //console.log(data);
        $('#rutas').prop('disabled', false);
    });
}

/*function cambioDeClientesInicio(){
    $.get('/api/rutasClientes/'+1+'/cartaPorte', function (data) {
        var html_select = '';
        for (var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $("#rutas").html(html_select)
        console.log(data)
    });
}*/

jQuery.datetimepicker.setLocale('es');

jQuery('#fecha').datetimepicker({
    format:'Y/m/d H:i'
});

jQuery('#fechaDeEmbarque').datetimepicker({
    format:'Y/m/d H:i'
});

jQuery('#fechaDeEntrega').datetimepicker({
    format:'Y/m/d H:i'
});