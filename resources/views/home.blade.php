@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif

        <!-- Owl Carousel Assets -->
<link href="/css/owl.carousel.css" rel="stylesheet">
<link href="/css/owl.theme.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div style="font-size: 30px;">NOW SHOWING</div>

        <div id="owl-demo-now" class="owl-carousel">
            @foreach($movies as $movie)
                <div class="item"><a href="{{ url('/showtime',$movie->id) }}"><img src="{!! '/images/'.$movie->poster !!}" /></a></div>
            @endforeach
        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="font-size: 30px;">COMING SOON</div>
        <div id="owl-demo-coming" class="owl-carousel">
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6825" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6826" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6827" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6828" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6829" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6830" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6824" /></a></div>
            <div class="item"><a href="{{ url('/') }}"><img src="http://qfxcinemas.com/Home/GetThumbnailImage?EventID=6831" /></a></div>
        </div>
    </div>
</div>

<script src="/js/jquery-1.9.1.min.js"></script>
<script src="/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo-now").owlCarousel({
            autoPlay: 3000,
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });
        $("#owl-demo-coming").owlCarousel({
            autoPlay: 3000,
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });

    });
</script>

@endsection
