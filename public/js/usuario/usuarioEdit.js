$(document).ready(function(){

    if ($("#moduloUno").val() == 1){
        $("#modulo01_1").prop("checked", true)
        $('#modulo01').val(1)
    }else{
        $('#modulo01').val(0)
        $("#modulo01_1").prop("checked", false)
    }

    if ($("#moduloDos").val() == 1){
        $("#modulo02_2").prop("checked", true)
        $('#modulo02').val(1)
    }else{
        $('#modulo02').val(0)
        $("#modulo02_2").prop("checked", false);
    }

    if ($("#moduloTres").val() == 1){
        $("#modulo03_3").prop("checked", true)
        $('#modulo03').val(1)
    }else{
        $('#modulo03').val(0)
        $("#modulo03_3").prop("checked", false);
    }

    if ($("#moduloCuatro").val() == 1){
        $("#modulo04_4").prop("checked", true)
        $('#modulo04').val(1)
    }else{
        $('#modulo04').val(0)
        $("#modulo04_4").prop("checked", false);
    }

    if ($("#moduloCinco").val() == 1){
        $("#modulo05_5").prop("checked", true)
        $('#modulo05').val(1)
    }else{
        $('#modulo05').val(0)
        $("#modulo05_5").prop("checked", false);
    }

    if ($("#moduloSeis").val() == 1){
        $("#modulo06_6").prop("checked", true)
        $('#modulo06').val(1)
    }else{
        $('#modulo06').val(0)
        $("#modulo06_6").prop("checked", false);
    }

    if ($("#moduloSiete").val() == 1){
        $("#modulo07_7").prop("checked", true)
        $('#modulo07').val(1)
    }else{
        $('#modulo07').val(0)
        $("#modulo07_7").prop("checked", false);
    }

    if ($("#moduloOcho").val() == 1){
        $("#modulo08_8").prop("checked", true)
        $('#modulo08').val(1)
    }else{
        $('#modulo08').val(0)
        $("#modulo08_8").prop("checked", false);
    }

    if ($("#moduloNueve").val() == 1){
        $("#modulo09_9").prop("checked", true)
        $('#modulo09').val(1)
    }else{
        $('#modulo09').val(0)
        $("#modulo09_9").prop("checked", false);
    }
    if ($("#moduloDiez").val() == 1){
        $("#modulo10_10").prop("checked", true)
        $('#modulo10').val(1)
    }else{
        $('#modulo10').val(0)
        $("#modulo10_10").prop("checked", false);
    }

    $('#modulo01_1').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo01_1').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo01').val('1');
        }
        else
        {
            $('#modulo01').val('0');
        }
    });

    $('#modulo02_2').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo02_2').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo02').val('1');
        }
        else
        {
            $('#modulo02').val('0');
        }
    });

    $('#modulo03_3').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo03_3').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo03').val('1');
        }
        else
        {
            $('#modulo03').val('0');
        }
    });

    $('#modulo04_4').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo04_4').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo04').val('1');
        }
        else
        {
            $('#modulo04').val('0');
        }
    });
    $('#modulo05_5').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo05_5').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo05').val('1');
        }
        else
        {
            $('#modulo05').val('0');
        }
    });
    $('#modulo06_6').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo06_6').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo06').val('1');
        }
        else
        {
            $('#modulo06').val('0');
        }
    });
    $('#modulo07_7').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo07_7').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo07').val('1');
        }
        else
        {
            $('#modulo07').val('0');
        }
    });
    $('#modulo08_8').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo08_8').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo08').val('1');
        }
        else
        {
            $('#modulo08').val('0');
        }
    });
    $('#modulo09_9').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo09_9').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo09').val('1');
        }
        else
        {
            $('#modulo09').val('0');
        }
    });
    $('#modulo10_10').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#modulo10_10').change(function(){
        if($(this).prop('checked'))
        {
            $('#modulo10').val('1');
        }
        else
        {
            $('#modulo10').val('0');
        }
    });
}) //Document ready