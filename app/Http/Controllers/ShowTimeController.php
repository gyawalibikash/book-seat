<?php

namespace App\Http\Controllers;

use App\Day;
use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use App\NextMovies;


class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getShowtime($id)
    {

        $days = Day::all();
        $movie = Movies::findOrFail($id);

        $showtimes= ShowTime::all();
        return view('showtime.index',compact('movie','showtimes','days'));
    }

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index',compact('nextMovies'));
    }
}
