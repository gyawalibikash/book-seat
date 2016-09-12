@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div>
                    <img src="{!! '/images/'.$movie->poster !!}" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)" />
                </div>
                <div class="alert alert-success">
                    <p> Cast :{{ $movie->cast }}</p>
                    <p> Director :{{ $movie->director }}</p>
                    <p> Release Date :{{ $movie->release_date }}</p>
                    <p> Run Time :{{ $movie->run_time }}</p>
                </div>
                <div class="alert alert-info"> 
                    <p>Description : {{ $movie->description }}</p>
                </div>

           
                @if( Auth::check() && Auth::user()->isAdmin() )
                    <button class="cinehall">Released Cinehall</button>
                    {{ Form::model($movie, ['method' => 'DELETE','route' => ['upload.destroy', $movie->id]]) }}
                    <a href="{{ route('upload.edit',$movie->id)}}" class="btn btn-default btn-sm pull-right">Edit</a>
                    {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm pull-right'))}}
                    {!! Form::close() !!}
                @endif
            </div>
             <div class="col-lg-2">
                @foreach($cinehalls as $cinehall)
                    {{ $cinehall->name }}<br>
                        @foreach($cinehall->hall as $hall)
                            @foreach ($groups as $group)
                                @if ($group->hall_id == $hall->id)
                                    <ul class="list">
                                        <li>
                                        <?php $hallName[] = $hall->name; ?>
                                            <a href="{{ action('ShowTimeController@getShowtime', '?'.http_build_query(['movie' => $movie->id, 'cinehall' => $cinehall->id, 'hall' => $hall->id])) }}">
                                                {{ $hall->name }}
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
            </div>
            <div class="col-lg-6">
                <table class="table" style="border:2px solid white;box-shadow:4px 4px 2px rgba(0,0,0,0.2)">
                    <tr>

                    <th style="font-size:20px;">Show Time</th>
                        <td>
                             <input id="dateType" type="text" class="form-control" placeholder="Select Date" name="date">                        
                        </td>
                    </tr>

                    <tbody id="showTimes">

                    @foreach($cinehalls as $cinehall)
                        @foreach($cinehall->hall as $hall)
                            @foreach($showtimes as $showtime)
                                @foreach($groups as $group)
                                    @if ($group->hall_id == $hall->id && $showtime->id == $group->showtime_id)
                                        <tr style="display:none;" data-id={{ $group->date }}>
                                            <td style="font-size:30px;">{{ $hall->name }}</td>
                                            <td>
                                                <a href="{{ action('BookSeatController@getMovieshow','?'.http_build_query(['movie'=>$movie->id, 'cinehall'=>$cinehall->id, 'hall'=>$hall->id, 'showtime'=>$showtime->id, 'date'=>''])) }}" class="book-seat-url btn btn-success btn-lg"><i class="glyphicon glyphicon-facetime-video" ></i>{{ $showtime->time }}</a>

                                                <?php $count = 0 ?>
                                                @foreach($bookseats as $bookseat)
                                                    @if ($bookseat->showtime_id == $showtime->id && $bookseat->movie_id == $movie->id && $bookseat->hall_id == $hall->id && $bookseat->cinehall_id == $cinehall->id)
                                                        <?php $bookedSeat[] = unserialize($bookseat->seat) ?>
                                                        @if (!empty($bookedSeat))
                                                        <?php
                                                            foreach($bookedSeat as $key => $value) {
                                                                $bookedSeatId= [];
                                                                foreach($value as $y) {
                                                                    $bookedSeatId[] = $y;
                                                                }
                                                            }
                                                                $count+=count($bookedSeatId);
                                                        ?>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <?php
                                                    if($count <= 20){
                                                        ?><h5 class="text-success">Seat Available</h5><?php
                                                    }
                                                    else{
                                                            ?><h5 class="text-danger">Filling Fast</h5><?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="successfullModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:677px;">

            <!-- Modal content-->
            <div class="modal-content" >
                <form id="form" action="" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Select Cinehall To Release Movies</h4>
                    </div>
                    <div class="modal-body" style="width:677px;">
                        
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
                        
                        <div class="row">
                            <div class="col-lg-4">
                                <input id="release_date" type="text" class="form-control" placeholder="Select Date" name="date">
                            </div>

                            <div class="col-lg-4">
                            @foreach($showtimes as $showtime)
                                {{ Form::checkbox('showtime[]', $showtime->id)}} {{ $showtime->time }}
                            @endforeach
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

    <script>
        $(function() {

            var today = new Date();
            console.log(today);
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd='0'+dd
            } 

            if(mm<10) {
                mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
            console.log(today);

            $('#showTimes').find('tr').each(function() {

                if (today == $(this).data('id')) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });
    </script>

@endsection