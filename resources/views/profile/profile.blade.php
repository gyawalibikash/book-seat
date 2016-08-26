@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <strong> Success:</strong> {!! Session::get('success') !!}
                </div>
            @endif

            <h2 id="h1">Name: {{ Auth::user()->name }} </h2>
            <p id="p"><b>Address :</b> {{ $profile->address }}</p>
            <p id="p"><b>Contact No :</b> {{ $profile->contact_no }}</p>
            <p id="p"><b>Gender :</b> {{ $profile->gender }}</p>

        </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
@endsection