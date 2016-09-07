$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    $(".seat").click(function(){
        var seat = [];
        $('#check input:checked').each(function() {
            if (!$(this).prop("disabled")) {
                seat.push($(this).attr('name'));
            }           
        });

        var seatName = seat.join(', ');
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
                        $("#" + seat).attr("disabled", "disabled");
                        $("#" + seat + "-label").css("background-color", "red");                       
                        $("#name").html(seatName);
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
        var dis = $('input[type="checkbox"]:disabled').length;
        var total = $('input:checked').length;

        $('#book').prop('disabled', (total-dis)==0);
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
               location.reload();
            },
            error: function () {
                bootbox.alert("Error");
            }
        });
    });

    $('#dateType').change(function() {
        var date = $(this).val();

        $('#showTimes').find('tr').each(function() {
            if (date == $(this).data('id')) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $('.book-seat-url').click(function(e) {
          e.preventDefault();
          var currentUrl = $(this).attr('href');
          var date = $('#dateType').val();
          if (date == "") {
            return false;
          }  

        var followURL = currentUrl + date;
        location.href = followURL;
    });

    $( "#release_date" ).datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
    });

    $( "#dateType" ).datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: 3,
    });

});