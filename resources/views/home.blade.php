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

<?php $currentDate = date("Y-m-d"); ?>

<div class="container">
    <div class="row">
        <div style="font-size: 30px;">NOW SHOWING</div>

        <div id="owl-demo-now" class="owl-carousel">
            @foreach($movies as $movie)
                @if($movie->release_date <= $currentDate)
                    <div class="item" ><a href="{{ action('CinehallController@getShow','?'.http_build_query(['movie'=>$movie->id])) }}"><img src="{!! '/images/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a>
                        <div class="text-danger text-center">{{ $movie->moviename }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="font-size: 30px;">COMING SOON</div>

        <div id="owl-demo-coming" class="owl-carousel">
           @foreach($movies as $movie)
                @if($movie->release_date > $currentDate)
                    <div class="item" ><a href="{{ url('/new',$movie->id) }}"><img src="{!! '/images/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a>
                        <div class="text-danger text-center">{{ $movie->moviename }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script src="/js/owl.carousel.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
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
