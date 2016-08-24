@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div style="font-size: 30px;">NOW SHOWING</div>
        <div class="col-lg-4">
            <a href="{{ url('/showtime') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6811" /></a>
        </div>
        <div class="col-lg-4">
            <a href="{{ url('/showtime') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6813" /></a>
        </div>
        <div class="col-lg-4">
            <a href="{{ url('/showtime') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6814" /></a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="font-size: 30px;">COMING SOON</div>
        <div class="col-lg-4">
            <a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6827" /></a>
        </div>
        <div class="col-lg-4">
            <a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6825" /></a>
        </div>
        <div class="col-lg-4">
            <a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6830" /></a>
        </div>
    </div>
</div>
@endsection
