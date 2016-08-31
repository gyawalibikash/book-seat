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
                                    <table class="table table-striped">
                                        <tr><td><strong>Name</strong></td><td>{{ Auth::user()->name }}</td></tr>
                                        <tr><td><strong>Seat</strong></td><td><span id="name"></span></td></tr>
                                        <tr><td><strong>Movie Name</strong></td><td>{{ $movie->moviename }}</td></tr>
                                        <tr><td><strong>ShowTime</strong></td><td>{{ $showtime->time }}</td></tr>
                                        <tr><td><strong>Cinehall Name</strong></td><td>{{ $cinehall->name }}</td></tr>

                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="panel-heading"><h1><marquee>{{ $cinehall->name }}</marquee></h1></div>
                        <div class="col-lg-4">
                            <div class="text-center"><img src="/images/now_showing/{{$movie->poster }}" ></div>
                        </div>
                        <div class="col-md-4">
                            <strong>Show Time :</strong> {{ $showtime->time }}<hr>
                            <strong>Cast :</strong> {{ $movie->cast }}<hr>
                            <strong> Director :</strong>{{ $movie->director }}<hr>
                            <strong> Release Date :</strong>{{ $movie->release_date }}<hr>
                            <strong> Run Time :</strong>{{ $movie->run_time }}
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center"><img src="/images/now_showing/{{$movie->poster }}" ></div>
                    </div>
        </div>
        <hr><hr>
                <div >
                    <div class="col-lg-4">
                    <table align="centre" class="table" id="check">
                        <tr><td> Platinum</td></tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="A{{ $i }}" id="A{{ $i }}" />A{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="B{{ $i }}" id="B{{ $i }}" />B{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="C{{ $i }}" id="C{{ $i }}" />C{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr><td>Premium</td></tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="D{{ $i }}" id="D{{ $i }}"/>D{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="E{{ $i }}" id="E{{ $i }}" />E{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="F{{ $i }}" id="F{{ $i }}" />F{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1;$i<=6;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="G{{ $i }}" id="G{{ $i }}"/>G{{ $i }}</label></td>
                            @endfor
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table align="centre" class="table" id="check">
                        <tr><td>.</td></tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="A{{ $i }}" id="A{{ $i }}"/>A{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="B{{ $i }}" id="B{{ $i }}"/>B{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="C{{ $i }}" id="C{{ $i }}"/>C{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr><td>.</td></tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="D{{ $i }}" id="D{{ $i }}"/>D{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="E{{ $i }}" id="E{{ $i }}"/>E{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="F{{ $i }}" id="F{{ $i }}"/>F{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=7;$i<=12;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="G{{ $i }}" id="G{{ $i }}"/>G{{ $i }}</label></td>
                            @endfor
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table align="centre" class="table" id="check">
                        <tr><td>.</td></tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="A{{ $i }}" id="A{{ $i }}"/>A{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="B{{ $i }}" id="B{{ $i }}"/>B{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="C{{ $i }}" id="C{{ $i }}"/>C{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr><td>.</td></tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="D{{ $i }}" id="D{{ $i }}"/>D{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="E{{ $i }}" id="E{{ $i }}"/>E{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="F{{ $i }}" id="F{{ $i }}"/>F{{ $i }}</label></td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=13;$i<=18;$i++)
                                <td class="checkbox-inline"><label><input type="checkbox" name="G{{ $i }}" id="G{{ $i }}"/>G{{ $i }}</label></td>
                            @endfor
                        </tr>
                    </table>
                </div>

                <div class="col-lg-6">
                    <a class="seat btn btn-success disabled" id="book">Book</a>
                </div>

            </div>
        </div>
        {{--{{ Carbon::now() }}--}}
            {{--<div class="row">--}}
                {{--<div id="div1">Do you want to view your profile?</div>--}}
                {{--<button>View Profile</button>--}}
            {{--</div>--}}
    </div>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
        document.getElementById("A1").style.background = "red";
        document.getElementById("A1").setAttribute("disabled","disabled");

        @foreach ($bookseats as $bookseat)
            @if ($bookseat->showtime_id == $showtime->id && $bookseat->movie_id == $movie->id)
                document.getElementById("A1").style.background = "red";
                document.getElementById("A1").setAttribute("disabled","disabled");
            @endif
        @endforeach
        document.getElementById("print").onclick = function() {
            printElement(document.getElementById("printThis"));
            window.print();
                $("#successModal").modal('hide');
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
