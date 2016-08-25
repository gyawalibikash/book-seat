<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;


class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getShowtime($id)
    {
        $movie = Movies::findOrFail($id);

        $showtimes= ShowTime::all();
        return view('showtime.index',compact('movie','showtimes'));
    }
}
