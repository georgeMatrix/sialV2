$(document).ready(function() {
    $("#formularioCliente").on('submit', function(){
        $("#guardarCliente").prop("disabled", true);
    })
});