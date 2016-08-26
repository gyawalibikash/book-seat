@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile</div>
                <div class="panel-body">

                    <h2>Name: {{ Auth::user()->name }} </h2>
                    <p><b>Address :</b> {{ $profile->address }}</p>
                    <p><b>Contact No :</b> {{ $profile->contact_no }}</p>
                    <p><b>Gender :</b> {{ $profile->gender }}</p>

                    <a href="{{ route('profile.edit',['id'=>Auth::user()->id]) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('/') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
@endsection

