@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $movie->moviename }}</h1>
                <table class="table" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                    <tr><th style="font-size:20px;">Show Time</th><td></td><tr>
                    @foreach($showtimes as $showtime)
                        <tr><td style="font-size:30px;">{{ $showtime->time }}</td><td><a href="{{ url('/bookseat/movieshow/'.$movie->id, $showtime->id) }}" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-facetime-video"></i>
                    @endforeach
                </table>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/now_showing/'.$movie->poster !!}">
                <p> Cast:</p>
            </div>
        </div>
    </div>
    <script src="/js/jquery-1.9.1.min.js"></script>
@endsection