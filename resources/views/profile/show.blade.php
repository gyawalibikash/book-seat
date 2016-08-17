@extends('layouts.app')

@section('content')
    <h1> {{ Auth::user()->name }} </h1>

    <p><b>Address :</b> {{ $profile->address }}</p>
    <p><b>Contact No :</b> {{ $profile->contact_no }}</p>
    <p><b>Gender :</b> {{ $profile->gender }}</p>

    <a href="{{ route('profile.edit',['id'=>Auth::user()->id]) }}" class="btn btn-primary">Edit</a>
    <a href="{{ url('bookseat') }}" class="btn btn-info">Back</a>
@endsection

