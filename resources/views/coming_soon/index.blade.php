@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h1>{{ $nextMovie->moviename }}</h1>
                
            </div>
            <div class="col-md-4 col-md-offset-1">
                <img src="{!! '/images/coming_soon/'.$nextMovie->poster !!}">
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="/js/jquery-1.9.1.min.js"></script>
@endsection