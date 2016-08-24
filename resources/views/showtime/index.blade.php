@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Show Time</h2>
                <h4>Movie Name</h4>
                <p>8.30</p>
                <p>1.30</p>
                <p>6.30</p>
                <a href="{{ url('/bookseat') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-facetime-video"></i> Book</a>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection