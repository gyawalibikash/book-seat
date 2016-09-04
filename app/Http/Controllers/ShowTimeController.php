<?php

namespace App\Http\Controllers;

use App\Cinehall;
use App\Day;
use App\Group;
use App\Hall;
use App\Movies;
use App\NextMovies;
use App\ShowTime;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

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

        $days = Day::lists('day', 'id');

        $showtimes = ShowTime::all();

        $groups = Group::distinct('showtime_id', 'hall_id')->where('movie_id', $movie_id)->get();

        return view('showtime.index', compact('movie', 'cinehall', 'showtimes', 'days', 'hall', 'groups'));

    }

    public function getNew($id)
    {
        $nextMovies = NextMovies::findOrFail($id);
        return view('coming_soon.index', compact('nextMovies'));
    }
}
