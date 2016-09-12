@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Uplaod Movie To Release</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Movies</div>

                    <div class="panel-body">
                        {!! Form::open(['id'=>'uploadForm', 'class' => 'form-horizontal', 'method'=>'post', 'enctype'=>'multipart/form-data', 'files'=>'true']) !!}

                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="alert alert-danger show-div" style="display:none">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&chi;</button>
                                <ul class="list list-group">
                                    <p id="errors"></p>
                                </ul>
                            </div>
                        </div>        

                        <div class="form-group {{ $errors->has('moviename') ? ' has-error' : '' }} ">                        
                            <label for="moviename" class="col-md-4 control-label">Movie To Release :</label>
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
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>

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
                            <div class="col-md-6 image-editor">
                                <input id="poster" type="file" name="poster" value="{{ old('poster') }}" class="cropit-image-input">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poster') }}</strong>
                                    </span>
                                @endif
                                <div id="show-image" style="display:none";>
                                    <div class="cropit-preview"></div>
                                    <div class="image-size-label">
                                        Resize image
                                    </div>
                                    <input type="range" class="cropit-image-zoom-input">
                                </div>
                                <br />
                                <p id="error"></p>
                                <input type="hidden" id="image" name="image" value="" />
                                {!! Form::submit('Save', ['class' => 'btn btn-primary export']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery.cropit.js"></script>
    <script>
        $(function() {
            $('.image-editor').cropit({
                imageState: {
                    src: 'http://lorempixel.com/500/400/',
                },
            });

            $('input[type="file"]').change(function () {
                $("#show-image").show();
            });

            $('#uploadForm').submit(function(event) {
                event.preventDefault();
                var imageData = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                });
                $("#image").val(imageData);

                var formData = $(this).serialize();
                $.ajax({
                    url: '/upload',
                    type: 'POST',
                    data: formData,
                    success: function () {
                        location.href = '/';
                    },
                    error: function(xhr, status, error) {
                        var data = xhr.responseText;
                        var jsonResponse = JSON.parse(data);

                        var msg = [];
                        $.each(jsonResponse, function(index, value) {
                            msg.push('<li>' + value + '</li>');
                        });

                        $(".show-div").show();       
                        $("#errors").html(msg);              
                    },
                });       
            });
        });
    </script>

@endsection