<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use App\NextMovies;

use App\Day;


class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getShowtime(Request $request, $id)
    {
        $movie = Movies::findOrFail($id);

        $days = Day::lists('day', 'id');
        // $day_select = array();

        // foreach ($days as $day) {
        //     $day_select[$day->id] = $day->day;
        // }

        $showtimes= ShowTime::all();
        return view('showtime.index',compact('movie','showtimes', 'days', 'dayTime'));
    }

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index',compact('nextMovies'));
    }
}
