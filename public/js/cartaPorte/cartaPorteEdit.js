
$(document).ready(function() {
    cambioDeClientesInicio($("#clientes").val());
    $("#clientes").change(cambioDeClientes)
});

function cambioDeClientes(){
    var clientesId = $(this).val();
    $.get('/api/rutasClientes/'+clientesId+'/cartaPorte', function (data) {
        var html_select = '';
        for (var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $("#rutas").html(html_select)
        console.log(data)
    });
}

function cambioDeClientesInicio(valorInicial){
    $.get('/api/rutasClientes/'+valorInicial+'/cartaPorte', function (data) {
        var html_select = '';
        for (var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $("#rutas").html(html_select)
        console.log(data)
    });
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

jQuery('#fecha').datepicker({
    format: "yyyy/mm/dd",
    timeFormat:  "hh:mm:ss",
    language: "es",
    autoclose: true
});

jQuery('#fechaDeEmbarque').datepicker({
    format: "yyyy/mm/dd",
    timeFormat:  "hh:mm:ss",
    language: "es",
    autoclose: true
});

jQuery('#fechaDeEntrega').datepicker({
    format: "yyyy/mm/dd",
    timeFormat:  "hh:mm:ss",
    language: "es",
    autoclose: true
});

$("#fecha").keydown(function(e){
    e.preventDefault();
});