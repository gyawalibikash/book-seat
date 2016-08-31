<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use App\NextMovies;

use Session;

use App\Day;

use App\Hall;

use App\Cinehall;


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
        $cinehall_id = $_GET['cinehall'];
        $hall_id = $_GET['hall'];

        $movie = Movies::findOrFail($movie_id);
        $cinehall = Cinehall::findOrfail($cinehall_id);
        $hall = Hall::findOrfail($hall_id);

        $days = Day::lists('day','id');

        $showtimes= ShowTime::all();

        return view('showtime.index',compact('movie','cinehall','showtimes','days','hall'));

    }

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index', compact('nextMovies'));
    }
}
