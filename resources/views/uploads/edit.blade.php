@extends('layouts.app')

@section('content')
    {!! Form::model($movie, ['method' => 'PUT', 'route' => ['upload.update', $movie->id]]) !!}
    <div class="row">
        <div class="form-group" {{ $errors->has('moviename') ? ' has-error' : '' }}>
            <div class="col-md-3">
                {{ Form::label('moviename', 'Movie Name:',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('moviename', null,['class'=> 'form-control']) }}
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
            <div class="col-md-3">
                {{ Form::label('description', 'Description :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('description', null,['class'=> 'form-control']) }}
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
            <div class="col-md-3">
                {{ Form::label('release_date', 'Release date :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('release_date', null,['class'=> 'form-control',"id"=>"release_date"]) }}
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
            <div class="col-md-3">
                {{ Form::label('run_time', 'Run time :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('run_time', null, ['class'=> 'form-control']) }}
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
            <div class="col-md-3">
                {{ Form::label('cast', 'Cast :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('cast', null,['class'=> 'form-control']) }}
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
            <div class="col-md-3">
                {{ Form::label('director', 'Director :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('director', null,['class'=> 'form-control']) }}
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
            <div class="col-md-3">
                {{ Form::label('poster', 'poster :',["class"=>"input-lg"]) }}
            </div>
            <div class="col-lg-6">
                {{ Form::text('poster', null,['class'=> 'form-control']) }}
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