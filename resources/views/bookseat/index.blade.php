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
                        <table>
                            <tr>
                                <td><a href="#" class="btn btn-block btn-default" onclick="func()">Seat</a>
                            </tr>
                        </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
