@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $movie->moviename }}</h1>
                <h2>Show Time</h2>
                <p>8.30<a href="{{ url('/bookseat') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-facetime-video"></i> Book</a></p>
                <p>1.30<a href="{{ url('/bookseat') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-facetime-video"></i> Book</a></p>
                <p>6.30<a href="{{ url('/bookseat') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-facetime-video"></i> Book</a></p>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/now_showing/'.$movie->poster !!}">
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection