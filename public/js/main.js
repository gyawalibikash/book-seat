$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    $(".seat").click(function(){
        var seat = [];
        $('#check input:checked').each(function() {
            seat.push($(this).attr('name'));
        });

        var path = location.search;

        bootbox.confirm("Do you want to book seat "+seat+"?", function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    url: '/bookseat/moviestore',
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

    $('input:checkbox').click(function () {
        $('#book').prop('disabled', !$('input:checked').length);
    });

    $(".cinehall").click(function(){
        $("#successfullModal").modal('show');
    });

    $( "#form" ).submit(function(event) {
        event.preventDefault();

        var data = $(this).serialize();

        var path = location.search;

        $.ajax({
            type: "POST",
            url: '/showing/store',
            data: {
                name: data,
                path: path
            },
            success: function () {
                bootbox.alert("Success");
            },
            error: function () {
                bootbox.alert("Error");
            }
        });
    });
});