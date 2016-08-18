@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <h1 id="h1"> {{ Auth::user()->name }} </h1>
    <p id="p"><b>Address :</b> {{ $profile->address }}</p>
    <p id="p"><b>Contact No :</b> {{ $profile->contact_no }}</p>
    <p id="p"><b>Gender :</b> {{ $profile->gender }}</p>
@endsection