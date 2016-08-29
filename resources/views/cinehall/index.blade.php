@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-4 ">
            <div class="item" ><a href="{{ url('/showtime',$movie->id) }}"><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a></div>
        </div>
    @foreach($cinehalls as $cinehall)
        <div class="row">
            <div class="col-lg-4">
               <a href="{{ url('/showtime',$movie->id) }}"> {{ $cinehall->name }}</a>
                @endforeach
            </div>

        </div>
    </div>
@endsection