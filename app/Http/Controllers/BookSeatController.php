<?php

namespace App\Http\Controllers;


use App\Cinehall;
use App\Hall;
use App\Movies;
use App\Day;
use App\ShowTime;

use Auth;
use Event;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Events\TruncateBookSeatEvent;
use App\BookSeat;





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

        $showtime_id = $_GET['showtime'];
        $movie_id = $_GET['movie'];
        $cinehall_id = $_GET['cinehall'];
        $hall_id = $_GET['hall'];
        $day_id = $_GET['day'];

        $cinehall = Cinehall::findOrfail($cinehall_id);
        $hall = Hall::findOrfail($hall_id);
        $showtime = ShowTime::findOrFail($showtime_id);
        $movie = Movies::find($movie_id);
        $day = Day::findOrFail($day_id);


        $bookseats = BookSeat::all();

        return view('bookseat.index', compact('bookseats', 'showtime', 'movie', 'cinehall', 'hall','day'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postMoviestore(Request $request)
    {
        $query_string = $request['path'];
        $string = ltrim($query_string, '?');
        parse_str($string, $result);

        $showTime = $result['showtime'];
        $movie_id = $result['movie'];
        $cinehall_id = $result['cinehall'];
        $hall_id = $result['hall'];
        $day_id = $result['day'];

        $bookseat = new BookSeat();
        $bookseat->seat = serialize($request['name']);
        $bookseat->user_id = Auth::user()->id;
        $bookseat->showtime_id = $showTime;
        $bookseat->movie_id = $movie_id;
        $bookseat->day_id = $day_id;
        $bookseat->hall_id = $hall_id;
        $bookseat->cinehall_id = $cinehall_id;

        $bookseat->save();

        return;
    }
}
