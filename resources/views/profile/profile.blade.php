@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <h1> {{ Auth::user()->name }} </h1>
    <p><b>Address :</b> {{ $profile->address }}</p>
    <p><b>Contact No :</b> {{ $profile->contact_no }}</p>
    <p><b>Gender :</b> {{ $profile->gender }}</p>
@endsection