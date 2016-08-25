@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <div class="container">
            {{--@section('sidebar')--}}
            {{--@foreach($images as $image)--}}
                {{--<div>--}}
                    {{--<a href="#" onclick="image() " id="movie"> {{ $image->moviename }}</a>--}}
                {{--</div>--}}
                {{--@endforeach--}}
            {{--@endsection--}}
        <div class="row">
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
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>

                    </div>
                </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Book Seat</div>

                        <div class="col-lg-8">
                            <div class="text-center" id="blah"><img src="/images/default.jpg" height="200" width="50%" ></div>
                            <div id="blah1">: Showing</div>
                            <div id="blah2">Show Time</div>
                        </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                @for($i=1;$i<=6;$i++)
                                    <td><a id="A{{ $i }}" class="seat btn btn-default btn-lg">A{{ $i }}</a></td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i=1;$i<=6;$i++)
                                    <td><a id="B{{ $i }}" class="seat btn btn-default btn-lg">B{{ $i }}</a></td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i=1;$i<=6;$i++)
                                    <td><a id="C{{ $i }}" class="seat btn btn-default btn-lg">C{{ $i }}</a></td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i=1;$i<=6;$i++)
                                    <td><a id="D{{ $i }}" class="seat btn btn-default btn-lg">D{{ $i }}</a></td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i=1;$i<=6;$i++)
                                    <td><a id="E{{ $i }}" class="seat btn btn-default btn-lg">E{{ $i }}</a></td>
                                @endfor
                            </tr>
                        </table>
                    </div>
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
        @foreach ($bookseats as $bookseat)
            document.getElementById("{{ $bookseat->seat }}").style.background = "red";
            document.getElementById("{{ $bookseat->seat }}").className += " disabled";
        @endforeach
        document.getElementById("print").onclick = function() {
            printElement(document.getElementById("printThis"));
            window.print();
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
