@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Now Showing</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => '/upload/upload', 'class' => 'form-horizontal' ,'method'=>'post', 'enctype'=>'multipart/form-data','files'=>'true']) !!}

                        <div class="form-group {{ $errors->has('moviename') ? ' has-error' : '' }} ">
                            <label for="address" class="col-md-4 control-label">Movie Name</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="moviename" value="{{ old('moviename') }}">

                                @if ($errors->has('moviename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('moviename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" {{ $errors->has('image') ? ' has-error' : '' }}>
                            <label for="contact_no" class="col-md-4 control-label">Movie Poster</label>
                            <div class="col-md-6">
                                <input id="contact_no" type="file" name="poster" value="{{ old('poster') }}">

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

                <div class="panel panel-default">
                    <div class="panel-heading">Next Change</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => '/upload/newupload', 'class' => 'form-horizontal' ,'method'=>'post', 'enctype'=>'multipart/form-data','files'=>'true']) !!}

                        <div class="form-group {{ $errors->has('moviename') ? ' has-error' : '' }} ">
                            <label for="address" class="col-md-4 control-label">Movie Name</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="moviename" value="{{ old('moviename') }}">

                                @if ($errors->has('moviename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('moviename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" {{ $errors->has('image') ? ' has-error' : '' }}>
                            <label for="contact_no" class="col-md-4 control-label">Movie Poster</label>
                            <div class="col-md-6">
                                <input id="contact_no" type="file" name="poster" value="{{ old('poster') }}">

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
        </div>
    </div>
    </div>
@endsection