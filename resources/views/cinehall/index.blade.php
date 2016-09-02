@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-lg-4 ">
            <div ><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></div>
                @if( Auth::check() && Auth::user()->isAdmin() )
                    <button class="cinehall">Released Cinehall</button>
                @endif
        </div>

        <div class="row">
            @foreach($cinehalls as $cinehall)
                <div class="col-lg-6">
                     {{ $cinehall->name }}
                    @foreach($cinehall->hall as $hall)
                        <ul class="list">
                            <li><a href="{{ action('ShowTimeController@getShowtime', '?'.http_build_query(['movie' => $movie->id, 'cinehall' => $cinehall->id, 'hall' => $hall->id])) }}">{{ $hall->name }}</a></li>
                        </ul>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div id="successfullModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <form id="form" action="" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Select Cinehall To Release Movies</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($cinehalls as $cinehall)
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table">
                                    <tr>
                                        <td>{{ $cinehall->name }}</td>
                                            @foreach($cinehall->hall as $key=>$hall)
                                                    <td> <input type="checkbox" name="{{ strtolower(str_replace(" ", "_", $cinehall->id)) }}[]" value="{{$hall->id}}" />{{ $hall->name }}</td>
                                            @endforeach
                                    </tr>
                                    </table>
                                </div>
                          </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-default" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="/js/jquery-1.9.1.min.js"></script>
