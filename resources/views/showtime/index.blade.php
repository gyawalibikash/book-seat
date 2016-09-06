@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $movie->moviename }}</h1>
                <h2>{{ $cinehall->name }}</h2>
                <h2>{{ $hall->name }}</h2>

                <table class="table" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                    <tr>

                    <th style="font-size:20px;">Show Time</th>
                        <td>
                             <input id="date" type="text" class="form-control" placeholder="Select Date" name="date">                        
                        </td>
                    </tr>

                    <tbody id="showTimes">                     
                    @foreach($showtimes as $showtime)  
                        @foreach($groups as $group)
                            @if ($showtime->id == $group->showtime_id)                                     
                                <tr style="display:none;" data-id={{ $group->date }}>
                                    <td style="font-size:30px;">{{ $showtime->time }}</td>
                                    <td>
                                        <a href="{{ action('BookSeatController@getMovieshow','?'.http_build_query(['movie'=>$movie->id, 'cinehall'=>$cinehall->id, 'hall'=>$hall->id, 'showtime'=>$showtime->id, 'date'=>''])) }}" class="book-seat-url btn btn-success btn-lg"><i class="glyphicon glyphicon-facetime-video" ></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-4 col-md-offset-1">
              <img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">

                <div class="alert alert-success">
                    <p> Cast : {{ $movie->cast }}</p>
                    <p> Director : {{ $movie->director }}</p>
                    <p> Release Date : {{ $movie->release_date }}</p>
                    <p> Run Time : {{ $movie->run_time }}</p> 
                </div>
                <div class="alert alert-info">
                    <p> Description : {{ $movie->description }} </p>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#date" ).datepicker({
                dateFormat: "yy-mm-dd",
                minDate: 0,
                maxDate: 3,
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.book-seat-url').click(function(e) {
                  e.preventDefault();
                  var currentUrl = $(this).attr('href');
                  var date = $('#date').val();
                  if (date == "") {
                    return false;
                  }  

                var followURL = currentUrl + date;
                location.href = followURL;
            });

            $('#date').change(function() {
                var date = $(this).val();

                console.log(date);

                $('#showTimes').find('tr').each(function() {
                    if (date == $(this).data('id')) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

        });
    </script>
@endsection