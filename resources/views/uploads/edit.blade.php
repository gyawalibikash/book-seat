@extends('layouts.app')
@section('content')
    {!! Form::model($movie, ['method' => 'PUT', 'route' => ['upload.update', $movie->id]]) !!}
<div class="row">
    <div class="form-group" {{ $errors->has('moviename') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('moviename', 'Movie Name:',["class"=>"input-lg"]) }}
            {{ Form::text('moviename', null) }}
            @if ($errors->has('moviename'))
                <span class="help-block">
                    <strong>{{ $errors->first('moviename') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('description') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('description', 'Description :',["class"=>"input-lg"]) }}
            {{ Form::text('description', null) }}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('release_date') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('release_date', 'Release date :',["class"=>"input-lg"]) }}
            {{ Form::text('release_date', null) }}
            @if ($errors->has('release_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('release_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('run_time') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('run_time', 'Run time :',["class"=>"input-lg"]) }}
            {{ Form::text('run_time', null) }}
            @if ($errors->has('run_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('run_time') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('cast') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('cast', 'Cast :',["class"=>"input-lg"]) }}
            {{ Form::text('cast', null) }}
            @if ($errors->has('cast'))
                <span class="help-block">
                     <strong>{{ $errors->first('cast') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('director') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('director', 'Director :',["class"=>"input-lg"]) }}
            {{ Form::text('director', null) }}
            @if ($errors->has('director'))
                <span class="help-block">
                     <strong>{{ $errors->first('director') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" {{ $errors->has('poster') ? ' has-error' : '' }}>
        <div class="col-md-6">
            {{ Form::label('poster', 'poster :',["class"=>"input-lg"]) }}
            {{ Form::text('poster', null) }}
            @if ($errors->has('poster'))
                <span class="help-block">
                 <strong>{{ $errors->first('poster') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

    {!! Form::submit('Update', array('class'=>'btn btn-primary pull-right btn-h1-margin'))!!}
    <a href="{{ route('home') }}" class="btn btn-default pull-right btn-h1-margin">Cancel</a>
    {!! Form::close()  !!}

@endsection