@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $movie->moviename }}</h1>
                <h2>{{ $cinehall->name }}</h2>
                <h2>{{ $hall->name }}</h2>

                <table class="table" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                    <tr><th style="font-size:20px;">Show Time</th>
                        <td>
                             {{ Form::select('day', $days, null, ['placeholder' => 'Select Day', 'id' => 'day', 'class' => 'form-control'])}} <p iyd="error"></p>
                        </td>
                    <tr>
                    @foreach($showtimes as $showtime)
                        @foreach ($groups as $group)
                            @if ($group->showtime_id == $showtime->id && $group->hall_id == $hall->id)
                                <tr><td style="font-size:30px;">{{ $showtime->time }}</td><td><a href="{{ action('BookSeatController@getMovieshow','?'.http_build_query(['movie'=>$movie->id, 'cinehall'=>$cinehall->id, 'hall'=>$hall->id, 'showtime'=>$showtime->id, 'day'=>''])) }}" class="book-seat-url btn btn-success btn-lg"><i class="glyphicon glyphicon-facetime-video" ></i></a></td>
                            @endif
                        @endforeach
                    @endforeach
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
                </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-offset-1">
               <p class="alert alert-info"> Description : {{ $movie->description }} </p>
            </div>
        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.book-seat-url').click(function(e) {
                  e.preventDefault();
                  var currentUrl = $(this).attr('href');
                  var dayValue = $('#day').val();
                  if (dayValue == "") {
                    $('#error').html("Please choose").css("color", "red");
                    return false;
                  }  

                var followURL = currentUrl+dayValue;
                location.href = followURL;
            })

        });
    </script>
@endsection