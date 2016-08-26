<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use app\NextMovies;


class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getShowtime($id)
    {
        $showtimes = ShowTime::all();
        $movie = Movies::findOrFail($id);

        $showtimes= ShowTime::all();
        return view('showtime.index',compact('movie','showtimes'));
    }

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index',compact('nextMovies'));
    }
}
