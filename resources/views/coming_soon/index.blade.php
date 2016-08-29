@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $nextMovies->moviename }}</h1>

                <p> Description : {{ $nextMovies->description }} </p>
                
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/coming_soon/'.$nextMovies->poster !!}">
                <p> Cast : {{ $nextMovies->cast }}</p>
                <p> Director : {{ $nextMovies->director }}</p>
                <p> Release Date : {{ $nextMovies->release_date }}</p>
                <p> Run Time : {{ $nextMovies->run_time }}</p>
            </div>
        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
@endsection