@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <div class="container">
        <h1> Uplaod Movie To Releasing Soon</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Releasing Soon</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'releasingsoon.store', 'class' => 'form-horizontal' ,'method'=>'post', 'enctype'=>'multipart/form-data','files'=>'true']) !!}

                        <div class="form-group {{ $errors->has('moviename') ? ' has-error' : '' }} ">
                            <label for="moviename" class="col-md-4 control-label">Movie Name ( Releasing Soon):</label>
                            <div class="col-md-6">
                                <input id="moviename" type="text" class="form-control" name="moviename" value="{{ old('moviename') }}">

                                @if ($errors->has('moviename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('moviename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} ">
                            <label for="description" class="col-md-4 control-label">Description :</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('release_date') ? ' has-error' : '' }} ">
                            <label for="release_date" class="col-md-4 control-label">Release date :</label>
                            <div class="col-md-6">
                                <input id="release_date" type="text" class="form-control" name="release_date" value="{{ old('release_date') }}">

                                @if ($errors->has('release_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('run_time') ? ' has-error' : '' }} ">
                            <label for="run_time" class="col-md-4 control-label">Run time :</label>
                            <div class="col-md-6">
                                <input id="run_time" type="text" class="form-control" name="run_time" value="{{ old('run_time') }}">

                                @if ($errors->has('run_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('run_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('cast') ? ' has-error' : '' }} ">
                            <label for="cast" class="col-md-4 control-label">Cast :</label>
                            <div class="col-md-6">
                                <input id="cast" type="text" class="form-control" name="cast" value="{{ old('cast') }}">

                                @if ($errors->has('cast'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cast') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('director') ? ' has-error' : '' }} ">
                            <label for="director" class="col-md-4 control-label">Director :</label>
                            <div class="col-md-6">
                                <input id="director" type="text" class="form-control" name="director" value="{{ old('director') }}">

                                @if ($errors->has('director'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('director') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" {{ $errors->has('image') ? ' has-error' : '' }}>
                            <label for="poster" class="col-md-4 control-label">Movie Poster :</label>
                            <div class="col-md-6">
                                <input id="poster" type="file" name="poster" value="{{ old('poster') }}">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poster') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#release_date" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection