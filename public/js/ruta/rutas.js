

/*$('#accordion-one').on('show.bs.collapse', function () {
    console.log("has")
})*/
$("#accordion-one").collapse({
    show: false
})

$(document).ready(function(){
$(".accordion-btn").click(function(){
    $(this).find("#accordion-one").collapse({
        show: false
    })


    // $('#accordion-one').collapse({
    //     show: false
    // })


    //$("#accordion-one").addClass('show')
    /*if($("#accordion-one").hasClass('show')){
    console.log("tiene")

    }*/
    /*if($("#accordion-one").hasClass('show')){
        console.log("colapsado")
        $("#accordion-one").addClass('show')
        //$("#accordion-one").removeClass('collapse')
    }*/
})
    /*$('#accordion-one').on('show.bs.collapse', function () {
        console.log("has")
    })*/
    /*if ($("#accordion-one").hasClass('collapse show')){
        $("#accordion-one").collapse({
            show: true
        })
    }*/
})