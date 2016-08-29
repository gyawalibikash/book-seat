<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use App\NextMovies;

use Session;

use App\Day;


class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function getShowtime()
    {
        $movie_id = $_GET['movie'];
        $movie = Movies::findOrFail($movie_id);

        $days = Day::lists('day','id');

        $showtimes= ShowTime::all();
        return view('showtime.index',compact('movie','showtimes','days'));

    }

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index', compact('nextMovies'));
    }
}
