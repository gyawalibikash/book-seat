@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $movie->moviename }}</h1>

        <table class="table" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                    <tr><th style="font-size:20px;">Show Time</th>
                        <td>
                             {{ Form::select('day', $days, null, ['placeholder' => 'Select Day', 'id' => 'day'])}}
                        </td>
                    <tr>
                    @foreach($showtimes as $showtime)
                        <tr><td style="font-size:30px;">{{ $showtime->time }}</td><td><a href="{{ url('/bookseat/movieshow/'.$movie->id, ['2', $showtime->id]) }}" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-facetime-video"></i></a></td>
                    @endforeach
                </table>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/now_showing/'.$movie->poster !!}">
                <p> Cast :{{ $movie->cast }}</p>
                <p> Director :{{ $movie->director }}</p>
                <p> Release Date :{{ $movie->release_date }}</p>
                <p> Run Time :{{ $movie->run_time }}</p>
                @if( Auth::check() && Auth::user()->isAdmin() )
                    {{ Form::model($movie, ['method' => 'DELETE','route' => ['upload.destroy', $movie->id]]) }}
                    <a href="{{ route('upload.edit',$movie->id)}}" class="btn btn-default btn-sm pull-right">Edit</a>
                    {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm pull-right'))}}
                    {!! Form::close() !!}
                @endif
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
           <p> Description : {{ $movie->description }} </p>
        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#day').change(function(){
                var dayTime = $("#day option:selected").val();
            });    
        });
    </script>
@endsection