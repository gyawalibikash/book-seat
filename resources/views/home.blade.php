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
                <div class="item" ><a href="{{ url('showing/show',$movie->id) }}"><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a></div>
                {{--<div class="item" ><a href="{{ url('/showtime',$movie->id) }}"><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a></div>--}}
            @endforeach
        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="font-size: 30px;">COMING SOON</div>

        <div id="owl-demo-coming" class="owl-carousel">
           @foreach($nextMovies as $nextMovie)
                <div class="item" ><a href="{{ url('/new',$nextMovie->id) }}"><img src="{!! '/images/coming_soon/'.$nextMovie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></a></div>
            @endforeach
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
