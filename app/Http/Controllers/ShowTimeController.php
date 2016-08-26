<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movies;

use App\ShowTime;

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
        return view('showtime.index',compact('movie', 'showtimes'));
    }
}
