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
                        <div style="margin:auto; height:200px; width:50%; background-color:aliceblue"></div>
                        <table class="table table-striped">
                            <tr>
                                <td><a class="remove btn btn-default btn-lg">A1</a></td>
                                <td><a class="remove btn btn-default btn-lg">A2</a></td>
                                <td><a class="remove btn btn-default btn-lg">A3</a></td>
                                <td><a class="remove btn btn-default btn-lg">A4</a></td>
                                <td><a class="remove btn btn-default btn-lg">A5</a></td>
                                <td><a class="remove btn btn-default btn-lg">A6</a></td>
                            </tr>
                            <tr>
                                <td><a class="remove btn btn-default btn-lg">B1</a></td>
                                <td><a class="remove btn btn-default btn-lg">B2</a></td>
                                <td><a class="remove btn btn-default btn-lg">B3</a></td>
                                <td><a class="remove btn btn-default btn-lg">B4</a></td>
                                <td><a class="remove btn btn-default btn-lg">B5</a></td>
                                <td><a class="remove btn btn-default btn-lg">B6</a></td>
                            </tr>
                            <tr>
                                <td><a class="remove btn btn-default btn-lg">C1</a></td>
                                <td><a class="remove btn btn-default btn-lg">C2</a></td>
                                <td><a class="remove btn btn-default btn-lg">C3</a></td>
                                <td><a class="remove btn btn-default btn-lg">C4</a></td>
                                <td><a class="remove btn btn-default btn-lg">C5</a></td>
                                <td><a class="remove btn btn-default btn-lg">C6</a></td>
                            </tr>
                            <tr>
                                <td><a class="remove btn btn-default btn-lg">D1</a></td>
                                <td><a class="remove btn btn-default btn-lg">D2</a></td>
                                <td><a class="remove btn btn-default btn-lg">D3</a></td>
                                <td><a class="remove btn btn-default btn-lg">D4</a></td>
                                <td><a class="remove btn btn-default btn-lg">D5</a></td>
                                <td><a class="remove btn btn-default btn-lg">D6</a></td>
                            </tr>
                            <tr>
                                <td><a class="remove btn btn-default btn-lg">E1</a></td>
                                <td><a class="remove btn btn-default btn-lg">E2</a></td>
                                <td><a class="remove btn btn-default btn-lg">E3</a></td>
                                <td><a class="remove btn btn-default btn-lg">E4</a></td>
                                <td><a class="remove btn btn-default btn-lg">E5</a></td>
                                <td><a class="remove btn btn-default btn-lg">E6</a></td>
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
