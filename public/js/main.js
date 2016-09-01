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

        var path = $(location).attr('search');

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

        $.ajax({
            type: "POST",
            url: '/showing/store',
            data: data,
            success: function () {
                bootbox.alert("success");
            },
            error: function () {
                bootbox.alert("Error");
            }
        });
        /*
        if ($("input[type='checkbox']").is(":checked"))
        {
            var formData = {
                'name' : $('input[name=name]').val(),
                'email' : $('input[name=email]').val(),

                'check' : $('input[name=checkbox]').val(),
            };
        }
        */

        console.log(data);
    });
});