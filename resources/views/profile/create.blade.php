@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Create Your Profile</h1>
            {!! Form::open(['url' => 'profile', 'files' => true]) !!}
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} ">
                    <label for="address" class="col-lg-2 control-label">Address</label>
                    <div>
                        <input id="address" type="text"  name="address" value="{{ old('address') }}">
                    </div>
                    @if ($errors->has('address'))
                        <span>
                            <li>{{ $errors->first('address') }}</li>
                        </span>
                    @endif
                </div>
            <div class="form-group" {{ $errors->has('contact_no') ? ' has-error' : '' }}>
                <label for="contact_no" class="col-lg-2 control-label">Contact</label>
                <div>
                    <input id="contact_no" type="text"  name="contact_no" value="{{ old('contact_no') }}">
                </div>
                @if ($errors->has('contact_no'))
                    <span>
                        <li>{{ $errors->first('contact_no') }}</li>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }} ">
                <label for="gender" class="col-lg-2 control-label">Gender</label>
                <div>
                    {!! Form::radio('gender', 'male') !!} Male
                    {!! Form::radio('gender', 'female') !!} Female
                </div>
                @if ($errors->has('gender'))
                    <span>
                            <li>{{ $errors->first('gender') }}</li>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
        </div>
    </div>
@endsection