@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @section('sidebar')
            @endsection
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Book Seat</div>

                    <div class="panel-body">
                        <div style="margin:auto; height:200px; width:50%; background-color:darkgray"></div>
                        <table class="table table-striped">
                            <tr>
                                <td><a id="A1" class="seat btn btn-default btn-lg">A1</a></td>
                                <td><a id="A2" class="seat btn btn-default btn-lg">A2</a></td>
                                <td><a id="A3" class="seat btn btn-default btn-lg">A3</a></td>
                                <td><a id="A4" class="seat btn btn-default btn-lg">A4</a></td>
                                <td><a id="A5" class="seat btn btn-default btn-lg">A5</a></td>
                                <td><a id="A6" class="seat btn btn-default btn-lg">A6</a></td>
                            </tr>
                            <tr>
                                <td><a id="B1" class="seat btn btn-default btn-lg">B1</a></td>
                                <td><a id="B2" class="seat btn btn-default btn-lg">B2</a></td>
                                <td><a id="B3" class="seat btn btn-default btn-lg">B3</a></td>
                                <td><a id="B4" class="seat btn btn-default btn-lg">B4</a></td>
                                <td><a id="B5" class="seat btn btn-default btn-lg">B5</a></td>
                                <td><a id="B6" class="seat btn btn-default btn-lg">B6</a></td>
                            </tr>
                            <tr>
                                <td><a id="C1" class="seat btn btn-default btn-lg">C1</a></td>
                                <td><a id="C2" class="seat btn btn-default btn-lg">C2</a></td>
                                <td><a id="C3" class="seat btn btn-default btn-lg">C3</a></td>
                                <td><a id="C4" class="seat btn btn-default btn-lg">C4</a></td>
                                <td><a id="C5" class="seat btn btn-default btn-lg">C5</a></td>
                                <td><a id="C6" class="seat btn btn-default btn-lg">C6</a></td>
                            </tr>
                            <tr>
                                <td><a id="D1" class="seat btn btn-default btn-lg">D1</a></td>
                                <td><a id="D2" class="seat btn btn-default btn-lg">D2</a></td>
                                <td><a id="D3" class="seat btn btn-default btn-lg">D3</a></td>
                                <td><a id="D4" class="seat btn btn-default btn-lg">D4</a></td>
                                <td><a id="D5" class="seat btn btn-default btn-lg">D5</a></td>
                                <td><a id="D6" class="seat btn btn-default btn-lg">D6</a></td>
                            </tr>
                            <tr>
                                <td><a id="E1" class="seat btn btn-default btn-lg">E1</a></td>
                                <td><a id="E2" class="seat btn btn-default btn-lg">E2</a></td>
                                <td><a id="E3" class="seat btn btn-default btn-lg">E3</a></td>
                                <td><a id="E4" class="seat btn btn-default btn-lg">E4</a></td>
                                <td><a id="E5" class="seat btn btn-default btn-lg">E5</a></td>
                                <td><a id="E6" class="seat btn btn-default btn-lg">E6</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            {{--<div class="row">--}}
                {{--<div id="div1">Do you want to view your profile?</div>--}}
                {{--<button>View Profile</button>--}}
            {{--</div>--}}
    </div>
@endsection
