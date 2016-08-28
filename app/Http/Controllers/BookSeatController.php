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
    public function getMovieshow(Request $request,$id)
    {
        //Event::fire(new TruncateBookSeatEvent(new BookSeat()));

        $showTime = $request->segment(4);

        $showtime =ShowTime::findOrFail($showTime);
        $movie=Movies::find($id);

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

        $showTime = $segment[4];
        $movie_id = $segment[3];

        $bookseat = new BookSeat();
        $bookseat->seat = $request['name'];
        $bookseat->user_id = Auth::user()->id;
        $bookseat->showtime_id = $showTime;
        $bookseat->movie_id = $movie_id;
        $bookseat->day_id = 6;

        $bookseat->save();

        return redirect('/');
    }

}
