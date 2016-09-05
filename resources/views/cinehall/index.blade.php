@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div ><img src="{!! '/images/now_showing/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" /></div>

                    <div class="alert alert-success">
                        <p> Cast :{{ $movie->cast }}</p>
                        <p> Director :{{ $movie->director }}</p>
                        <p> Release Date :{{ $movie->release_date }}</p>
                        <p> Run Time :{{ $movie->run_time }}</p>
                    </div>
               
                    @if( Auth::check() && Auth::user()->isAdmin() )
                        <button class="cinehall">Released Cinehall</button>
                        <a href="{{ route('upload.edit',$movie->id)}}" class="btn btn-default btn-sm pull-right">Edit</a>
                        {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm pull-right'))}}
                        {!! Form::close() !!}
                    @endif
            </div>
             <div class="col-lg-4">
                @foreach($cinehalls as $cinehall)
                    {{ $cinehall->name }}
                        @foreach($cinehall->hall as $hall)
                            @foreach ($groups as $group)
                                @if ($group->hall_id == $hall->id)
                                    <ul class="list">
                                        <li><a href="{{ action('ShowTimeController@getShowtime', '?'.http_build_query(['movie' => $movie->id, 'cinehall' => $cinehall->id, 'hall' => $hall->id])) }}">{{ $hall->name }}</a></li>
                                    </ul>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
            </div>
            <div class="col-lg-4">
         
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="successfullModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" >
                <form id="form" action="" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Select Cinehall To Release Movies</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                            @foreach($cinehalls as $cinehall)
                                <table class="table">
                                <tr>
                                    <td>{{ $cinehall->name }}</td>
                                        @foreach($cinehall->hall as $key=>$hall)
                                            <td> <input type="checkbox" name="{{ strtolower(str_replace(" ", "_", $cinehall->id)) }}[]" value="{{$hall->id}}" />{{ $hall->name }}</td>
                                        @endforeach
                                </tr>
                                </table>
                                @endforeach
                            </div>
                            <div class="col-lg-2">
                                <p id="dayName"></p>
                            </div>
                            <div class="col-lg-4">
                                <p id="showTime"></p>
                            </div>
                          </div>
                        
                        <div class="row">
                            <div class="col-lg-3">
                                {{ Form::select('day', $days, null, ['placeholder' => 'Select Day', 'id' => 'day', 'class' => 'form-control'])}}
                            </div>
                            <div class="col-lg-3">
                                {{ Form::select('showtime', $showtimes, null, ['placeholder' => 'Select Showtime', 'id' => 'showtime', 'class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    //     var dayName = [];
    //     var showTime = [];

    //     $('#day').change(function(e) {
    //         e.preventDefault();           
    //         dayName.push($('#day option:selected').text());
    //         var day = dayName.join(', ');
    //         $("#dayName").html(day);
    //     });

    //     $('#showtime').change(function(e) {
    //         e.preventDefault();            
    //         showTime.push($('#showtime option:selected').text());
    //         var show = showTime.join(', ');
    //         $("#showTime").html(show);
    //     });
    // });
</script>
