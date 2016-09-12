@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif

    <link rel="stylesheet" type="text/css" href="/css/style.css">
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
                    <div class="text-center"><img src="/images/{{$movie->poster }}" ></div>
                </div>
            </div>

                @foreach($bookseats as $bookseat)
                    @if ($bookseat->showtime_id == $showtime->id && $bookseat->movie_id == $movie->id && $bookseat->hall_id == $hall->id && $bookseat->cinehall_id == $cinehall->id)
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

        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table align="centre" class="table" id="check">
                <tr>
                    @if($hall->id ==1){{--gopi--}}
                        <?php $k='A';$l='G'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                        @elseif($hall->id == 2){{--kishan--}}
                            <?php $k='A';$l='H'; $m =1; $n=12 ?>
                            @for($i= $k;$i<=$l;$i++)
                                @for($j=$m;$j<=$n;$j++)
                                    <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                                @endfor
                            @endfor

                    @elseif($hall->id == 3){{--radha--}}
                        <?php $k='A';$l='J'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                    @elseif($hall->id == 4){{--qfx1--}}
                        <?php $k='A';$l='K'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                    @elseif($hall->id == 5){{--qfx2--}}
                        <?php $k='A';$l='L'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                    @elseif($hall->id == 6){{--qfx3--}}
                        <?php $k='A';$l='M'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                    @elseif($hall->id == 7){{--jay--}}
                        <?php $k='A';$l='N'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor

                    @elseif($hall->id == 8){{--nepal--}}
                        <?php $k='A';$l='O'; $m =1; $n=12 ?>
                        @for($i= $k;$i<=$l;$i++)
                            @for($j=$m;$j<=$n;$j++)
                                <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
                            @endfor
                        @endfor
                    @else
                     <p>No hall Selected</p>
                    @endif
                </tr>

            </table>
        </div>
        <div class="col-lg-1"></div>
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
