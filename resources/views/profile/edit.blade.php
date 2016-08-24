@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Your Profile</div>
                <div class="panel-body">

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
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Contact', 'Contact:') !!}
            {!! Form::text('contact_no', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Gender', 'Gender:') !!}
            {!! Form::radio('gender', 'male', ['class'=>'form-control']) !!} Male
            {!! Form::radio('gender', 'female', ['class'=>'form-control']) !!} Female
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('/') }}" class="btn btn-info">Cancel</a>
        </div>
        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection