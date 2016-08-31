$(document).ready(function(){

    $(".seat").click(function(){
        var seat = [];
        $('#check input:checked').each(function() {
            seat.push($(this).attr('name'));
        });

        var path = $(location).attr('search');

        // $(this).html('<i class="fa fa-refresh fa-spin"></i>');
        bootbox.confirm("Do you want to book seat "+seat+"?", function(result) {
            // $("#"+seat).html(seat);
            if (result) {
                $.ajax({
                     type: "POST",
                     url: '/bookseat/moviestore',
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        name: seat,
                        path: path
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

    $('#check input:checkbox').click(function () {
        $('#book').prop('disabled', !$('.checkbox:checked').length);
    });


    $(".cinehall").click(function(){

        $("#successfullModal").modal('show');


    });
});