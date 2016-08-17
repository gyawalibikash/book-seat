@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Profile</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($profile,['method' => 'PATCH', 'route' => ['profile.update', $profile->user_id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('Address', 'Address:') !!}
            {!! Form::text('address') !!}
        </div>
        <div class="form-group">
            {!! Form::label('Contact', 'Contact:') !!}
            {!! Form::text('contact_no') !!}
        </div>
        <div class="form-group">
            {!! Form::label('Gender', 'Gender:') !!}
            {!! Form::radio('gender', 'male') !!} Male
            {!! Form::radio('gender', 'female') !!} Female
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('bookseat') }}" class="btn btn-info">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection