@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Your Profile</div>
                <div class="panel-body">

                    {!! Form::open(['url' => 'profile', 'files' => true, 'class' => 'form-horizontal']) !!}
                        <div class="col-md-6 col-md-offset-4">
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <i>{{ $errors->first('user_id') }}</i>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} ">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" {{ $errors->has('contact_no') ? ' has-error' : '' }}>
                            <label for="contact_no" class="col-md-4 control-label">Contact</label>
                            <div class="col-md-6">
                                <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}">

                                @if ($errors->has('contact_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }} ">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                {!! Form::radio('gender', 'male', ['class'=>'form-control']) !!} Male
                                {!! Form::radio('gender', 'female', ['class'=>'form-control']) !!} Female

                                @if ($errors->has('gender'))
                                    <span>
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
@endsection