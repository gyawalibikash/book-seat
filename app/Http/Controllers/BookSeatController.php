<?php

namespace App\Http\Controllers;

use App\Movies;
use App\ShowTime;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\BookSeat;

use Auth;

use Event;

use App\Events\TruncateBookSeatEvent;

class BookSeatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getMovieshow()
    {
        //Event::fire(new TruncateBookSeatEvent(new BookSeat()));

        $showTime = $_GET['showtime'];
        $movie_id = $_GET['movie'];

        $showtime =ShowTime::findOrFail($showTime);
        $movie=Movies::find($movie_id);

        $bookseats = BookSeat::all();

        return view('bookseat.index', compact('bookseats','showtime', 'movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postMoviestore(Request $request)
    {
        $path = $request['path'];
        $segment = explode("/", $path);

        $showTime = $segment[5];
        $dayTime = $segment[4];
        $movie_id = $segment[3];

        $bookseat = new BookSeat();
        $bookseat->seat = $request['name'];
        $bookseat->user_id = Auth::user()->id;
        $bookseat->showtime_id = $showTime;
        $bookseat->movie_id = $movie_id;
        $bookseat->day_id = $dayTime;

        $bookseat->save();

        return redirect('/');
    }

}
