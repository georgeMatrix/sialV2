$(document).ready(function() {
    $("#formProvedor").on('submit', function(){
        $("#guardarProvedor").prop("disabled", true);
    })
});