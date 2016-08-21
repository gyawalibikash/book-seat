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
                $.ajax({
                    type: "POST",
                    url: 'bookseat',
                    beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                    },
                    data: {
                        name: seat
                    },
                    success: function () {
                        bootbox.alert("Success");
                        $("#" + seat).addClass("disabled").css("background-color", "red");
                    },
                    error: function () {
                        bootbox.alert("Error");
                    }
                });
            }
        });
    });
});


// $(document).ready(function(){
//         $("button").click(function(){
//                 $("#div1").load("profile #p,#h1");
//         });
// });
