//
//function func() {
//
//        alert("Do you want to book");
//}

$(document).ready(function(){
    $(".seat").click(function(){
        var seat = $(this).attr('id');
        bootbox.confirm("Do you want to book seat "+seat+"?", function(result) {
            if (result) {
                $("#"+seat).addClass("disabled").css("background-color", "red");
            }
        });
    });
});

// $(document).ready(function(){
//         $("button").click(function(){
//                 $("#div1").load("profile #p,#h1");
//         });
// });
