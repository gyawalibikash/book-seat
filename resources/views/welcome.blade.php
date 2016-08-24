@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div style="font-size: 30px;">NOW SHOWING</div>
        <div class="col-lg-4">
            <a href="{{ url('/showtime') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6812" /></a>
        </div>
        <div class="col-lg-4">
            <a href=""><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6813" /></a>
        </div>
        <div class="col-lg-4">
            <a href=""><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6814" /></a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="font-size: 30px;">COMING SOON</div>
        <div class="col-lg-4">
            <img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6811" />
        </div>
        <div class="col-lg-4">
            <img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6815" />
        </div>
        <div class="col-lg-4">
            <img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6816" />
        </div>
    </div>
</div>
@endsection
