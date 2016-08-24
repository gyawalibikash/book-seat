//
//function func() {
//
//        alert("Do you want to book");
//}

$(document).ready(function(){

    $(".seat").click(function(){
        var seat = $(this).attr('id');

        $(this).html('<i class="fa fa-refresh fa-spin"></i>');
        bootbox.confirm("Do you want to book seat "+seat+"?", function(result) {
            $("#"+seat).html(seat);
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
                        $("#" + seat).addClass("disabled").css("background-color", "red");
                        $("#name").html(seat);
                        $("#successModal").modal('show');
                    },
                    error: function () {
                        bootbox.alert("Error");
                    }
                });
            }
        });
    });
});

function image($image) {
    //if (input.files && input.files[0]) {
    //    var reader = new FileReader();
        $("#blah").html('<img id="movie" src="/images/$image" height="200" width="50%"/>');
        //reader.onload = function (e) {
        //    $('#blah')
        //        .attr('src','/images/suicide.jpg')
        //        .width(400)
                //.height(200);
        //};

        //reader.readAsDataURL(input.files[0]);
    //}
}
//
//function image2() {
//    $("#blah").html('<img id="suicide2" src="/images/suicide2.jpg" height="200" width="50%" />');
//    $("#blah1").prepend('Suicide Squid')
//}


// $(document).ready(function(){
//         $("button").click(function(){
//                 $("#div1").load("profile #p,#h1");
//         });
// });
