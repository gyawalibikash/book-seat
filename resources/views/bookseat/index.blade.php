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
                                <td ><a id="remove" class=" remove btn btn-block btn-default ">Seat</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div id="div1">Do you want to view your profile?</div>
                <button>View Profile</button>
            </div>
    </div>
@endsection
