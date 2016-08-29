@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-4 ">
            <div ><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></div>
        <button class="cinehall">Released Cinehall</button>
        </div>
    @foreach($cinehalls as $cinehall)
        <div class="row">
            <div class="col-lg-4">
               <a href="{{ action('ShowTimeController@getShowtime', '?'.http_build_query(['movie' => $movie->id]))  }}"> {{ $cinehall->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="successfullModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Cinehall To Release Movies</h4>
                </div>
                <div class="modal-body">
                    Modal
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">Ok</button>
                </div>
            </div>
        </div>
    </div>
    @if( Auth::check() && Auth::user()->isAdmin() )
        <a class="cinehall btn btn-default"> click</a>
    @endif
@endsection

<script src="/js/jquery-1.9.1.min.js"></script>
