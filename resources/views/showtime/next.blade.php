@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1 class="alert alert-success">{{ $movie->moviename }}</h1>
                <p class="alert alert-info"> Description : {{ $movie->description }} </p>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                <div class="alert alert-success">
                    <p> Cast : {{ $movie->cast }}</p>
                    <p> Director : {{ $movie->director }}</p>
                    <p> Release Date : {{ $movie->release_date }}</p>
                    <p> Run Time : {{ $movie->run_time }}</p>
                </div>
                @if( Auth::check() && Auth::user()->isAdmin() )
                    {{ Form::model($movie, ['method' => 'DELETE','route' => ['upload.destroy', $movie->id]]) }}
                    <a href="{{ route('upload.edit',$movie->id)}}" class="btn btn-default btn-sm pull-right">Edit</a>
                    {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm pull-right'))}}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endsection