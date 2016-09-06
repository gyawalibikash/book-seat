@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1 class="alert alert-success">{{ $nextMovies->moviename }}</h1>

                <p class="alert alert-info"> Description : {{ $nextMovies->description }} </p>
                
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/coming_soon/'.$nextMovies->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                <div class="alert alert-success">
                    <p> Cast : {{ $nextMovies->cast }}</p>
                    <p> Director : {{ $nextMovies->director }}</p>
                    <p> Release Date : {{ $nextMovies->release_date }}</p>
                    <p> Run Time : {{ $nextMovies->run_time }}</p>
                </div>
                @if( Auth::check() && Auth::user()->isAdmin() )
                    {{ Form::model($nextMovies, ['method' => 'DELETE','route' => ['releasingsoon.destroy', $nextMovies->id]]) }}
                    <a href="{{ route('releasingsoon.edit',$nextMovies->id)}}" class="btn btn-default btn-sm pull-right">Edit</a>
                    {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm pull-right'))}}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endsection