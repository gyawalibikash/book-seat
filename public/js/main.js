//
//function func() {
//
//        alert("Do you want to book");
//}

$(document).ready(function(){
        $("a.remove").click(function(){
                $("#remove").removeClass(" btn-default ").css("background-color", "yellow");
        });
});

$(document).ready(function(){
        $("button").click(function(){
                $("#div1").load("profile #p,#h1");
        });
});
