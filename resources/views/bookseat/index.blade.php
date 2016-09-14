@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <div class="container">
        <div class="row table-bordered glyphicon-modal-window">
            <!-- Modal -->
                <div id="successModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">E-ticket for BookSeat</h4>
                            </div>
                            <div class="modal-body">
                                <div id="printThis">
                                    <i>Congratulation you have booked this seat.</i> <hr />
                                    <h1>{{ $cinehall->name }}</h1>
                                    <h2><strong>Hall Name :</strong> {{ $hall->name }}</h2>
                                    <h3>{{ $_GET['date'] }}</h3>
                                    <table class="table table-striped">
                                        <tr><td><strong>Name</strong></td><td>{{ Auth::user()->name }}</td></tr>
                                        <tr><td><strong>Seat</strong></td><td><span id="name"></span></td></tr>
                                        <tr><td><strong>Movie Name</strong></td><td>{{ $movie->moviename }}</td></tr>
                                        <tr><td><strong>ShowTime</strong></td><td>{{ $showtime->time }}</td></tr>
                                        <tr><td><strong>Hall Name</strong></td><td>{{ $hall->name }}</td></tr>

                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="panel-heading">
                <h1><marquee>{{ $cinehall->name }}</marquee></h1>
                <h2>{{ $hall->name }}</h2>
            </div>
                <div class="col-lg-4">
                    <div class="text-center"><img src="/images/{{$movie->poster }}" ></div>
                </div>
                <div class="col-md-4 alert alert-success">
                    <strong>Show Time :</strong> {{ $showtime->time }}<hr>
                    <strong>Cast :</strong> {{ $movie->cast }}<hr>
                    <strong> Director :</strong> {{ $movie->director }}<hr>
                    <strong> Release Date :</strong> {{ $movie->release_date }}<hr>
                    <strong> Run Time :</strong> {{ $movie->run_time }}
                </div>
                <div class="col-lg-4">
                    <div class="text-center"><img src="/images/{{ $movie->poster }}" ></div>
                </div>
            </div>

                @foreach($bookseats as $bookseat)
                    @if ($bookseat->showtime_id == $showtime->id && $bookseat->movie_id == $movie->id && $bookseat->hall_id == $hall->id && $bookseat->cinehall_id == $cinehall->id && $bookseat->date == $date)
                        <?php $bookedSeat[] = unserialize($bookseat->seat) ?>
                    @endif
                @endforeach
                @if (!empty($bookedSeat))
                    <?php foreach($bookedSeat as $key => $value) {
                        foreach($value as $y) {
                            $bookedSeatId[] = $y;
                        }
                    }
                    if(count($bookedSeatId)<= 20){
                       ?> <h5 class="text-success"> Seat Available</h5><?php
                    }
                        elseif(count($bookedSeatId)<=40){
                        ?> <h5 class="text-danger"> Filling fast</h5><?php
                        }
                    ?>
                @endif

        <hr>
        <div class="col-lg-12">
            <input type="button" class="seat btn btn-success pull-right" id="book" disabled value="Book" />
        </div>
        <hr>

        <div class="col-lg-12">          
            @if($hall->name == 'Gopi'){{--gopi--}}
                @include('pattern.gopi')

            @elseif($hall->name == 'Krishna'){{--kishan--}}
                @include('pattern.krishna')

            @elseif($hall->name == 'Radha'){{--radha--}}
                @include('pattern.radha')

            @elseif($hall->name == 'QfxHall1'){{--qfx1--}}
                @include('pattern.qfx1')

            @elseif($hall->name == 'QfxHall2'){{--qfx2--}}
                @include('pattern.qfx2')

            @elseif($hall->name == 'QfxHall3'){{--qfx3--}}
                @include('pattern.qfx3')

            @elseif($hall->name == 'Jay'){{--jay--}}
                @include('pattern.jay')

            @else {{--nepal--}}
                @include('pattern.nepal')
            @endif           
        </div>
    </div>
        {{--{{ Carbon::now() }}--}}

    <script type="text/javascript">

        @if (!empty($bookedSeatId))
            var a = [];
            @foreach($bookedSeatId as $x)
                a.push({{ $x }});
            @endforeach

            for(var i=0;i< a.length;i++) {
                document.getElementById($(a[i]).attr('id')+"-label").style.background = "red";
                document.getElementById($(a[i]).attr('id')).setAttribute("disabled", "disabled");
                document.getElementById($(a[i]).attr('id')).setAttribute("checked", "checked");
            }
        @endif

        document.getElementById("print").onclick = function() {
            printElement(document.getElementById("printThis"));
            window.print();
            $("#successModal").modal('hide');
            location.reload();
        }

        function printElement(elem, append, delimiter) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            if (append !== true) {
                $printSection.innerHTML = "";
            }

            else if (append === true) {
                if (typeof(delimiter) === "string") {
                    $printSection.innerHTML += delimiter;
                }
                else if (typeof(delimiter) === "object") {
                    $printSection.appendChlid(delimiter);
                }
            }

            $printSection.appendChild(domClone);
        }

    </script>

@endsection
