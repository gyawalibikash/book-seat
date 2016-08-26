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
    public function getMovieshow($id)
    {
        //Event::fire(new TruncateBookSeatEvent(new BookSeat()));
        //$movie= Movies::findOrfail($id);
        $showtime =ShowTime::findOrFail($id);
        $bookseats = BookSeat::all();
//        $images = Images::all();
        return view('bookseat.index', compact('bookseats','showtime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $bookseat = new BookSeat();
        $bookseat->seat = $request['name'];
        $bookseat->user_id = Auth::user()->id;
        $bookseat->showtime_id = $request['time'];;
        $bookseat->movie_id = $request['moviename'];;

        $bookseat->save();

        return redirect('bookseat');
    }

}
