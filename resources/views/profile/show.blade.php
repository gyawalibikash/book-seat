@extends('layouts.app')

@section('content')
    <h1> {{ Auth::user()->name }} </h1>

    <p>Address : {{ $profile->address }}</p>
    <p>Contact No : {{ $profile->contact_no }}</p>
    <p>Gender : {{ $profile->gender }}</p>

    <a href="{{ route('profile.edit',['id'=>Auth::user()->id]) }}" class="btn btn-primary">Edit</a>
    <a href="{{ url('bookseat') }}" class="btn btn-info">Back</a>
@endsection

